<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Repositories\ProductosRepository;
use Illuminate\Support\Facades\Session;

class TransaccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function show(Transaccion $transaccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaccion $transaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaccion $transaccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaccion $transaccion)
    {
        //
    }

    //magia que busca un producto por el codigo y lo añade a session buscaPro
    public function search(Request $request, ProductosRepository $productos)
    {   
        $producto=$productos->getProduct($request->get('codigo'));
        if($producto!=null){
        session(['buscaPros' => $producto]);
        }
        return redirect()->route('newshop');
    }
    //magia que mata todas las session correspondiente a newsales
    public function kill()
    {
        session()->forget(['carrocompra', 'buscaPros', 'totalcompra']);

        return redirect()->route('newshop');
    }
    //magia que agrega productos a carroventa, en caso de ya existir le añade la cantidad ingresada al producto, actualizando los datos
    public function add(Request $request, ProductosRepository $productos)
    {
        //setea los valores obtenidos de la session y el request
        $cantidad = $request->get('cantidad');
        $total = 0;
        //construye un producto con la cantidad y datos por defecto de la base de datos
        $producto = $productos->getProduct(session('buscaPros')->codigo);
        $inventario = Inventario::query()
            ->where('producto_id', $producto->id)
            ->first();
        $producto['cantidad'] = $inventario['cantidad'];
        //verifica si la sesion con carroventa existe, luego la recorre para buscar coincidencias y añadir cantidad correspondiente
        if (session()->exists('carrocompra')) {
            //recorre session carroventa
            foreach (Session::get('carrocompra') as $pros) {
                //verifica si hay coincidencia con el producto buscado
                if ($pros['id'] == $producto['id']) {
                    //verifica stock de producto
                    if ($producto['cantidad'] >= ($pros['cantidad'] + $cantidad)) {
                        //suma cantidad correspondiente
                        $pros['cantidad'] = $pros['cantidad'] + $cantidad;
                        //aqui recorre la session carroventa para actualizar el valor total de venta
                        foreach (session('carrocompra') as $pro) {
                            $total = $total + ($pro['valor'] * $pro['cantidad']);
                            session(['totalcompra' => $total]);
                        }
                        //elimina la session buscaPro, que se usa para buscar el producto por el codigo
                        session()->forget('buscaPros');
                        return redirect()->route('newshop');
                    }
                }
            }
        }
        //en caso de no existir coinsidencias, se añade un producto a la sesion carroventa, actualizando los datos correspondientes
        //primero verifica si la cantidad ingresada es menos o igual a la disponible en stock
        if ($producto['cantidad'] >= $cantidad) {
            //setea la cantidad obtenida en request al producto creado
            $producto['cantidad'] = $cantidad;
            //ingresa el valor unitario del producto
            $producto['valor'] = $inventario['precio_unitario'];
            //lo añade a la session carroventa
            session()->push('carrocompra', $producto);
            //aqui recorre la session carroventa para actualizar el valor total de venta
            foreach (session('carrocompra') as $pro) {
                $total = $total + ($pro['valor'] * $pro['cantidad']);
                session(['totalcompra' => $total]);
            }
            //elimina la session buscaPro, que se usa para buscar el producto por el codigo
            session()->forget('buscaPros');
            return redirect()->route('newshop');
        } //en caso de no haber stock suficiente, vuelve a la pagina anterior y manda mensaje de producto sin stock
        else {
            return redirect()->route('newshop')->with([
                'message' => 'Producto sin stock suficiente'
            ]);
        }
    }
    //magia que borra un objeto de session carroventa
    public function del(Request $request)
    {
        if (session()->exists('carrocompra')) {
        $codigo = $request['codigo'];
        $total = 0;

        $productos = session('carrocompra');
        session()->forget(['carrocompra','totalcompra']);
        //recorre session carroventa
        foreach ($productos as $pros) {
            //verifica si hay coincidencia con el producto buscado
            if ($pros['codigo'] != $codigo) {
                session()->push('carrocompra', $pros);
            }
        }
        if (session()->exists('carrocompra')) {
            foreach (session('carrocompra') as $pro) {
                $total = $total + ($pro['valor'] * $pro['cantidad']);
                session(['totalcompra' => $total]);
            }
        }
        
    }
    return redirect()->route('newshop');
}
}
