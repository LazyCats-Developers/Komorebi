<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Inventario;
use App\Repositories\ProductosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\EmpresasRepository;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
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
    public function create(EmpresasRepository $empresa)
    {
        $productos=session('carroventa');
        $holder['total']=session()->get('totalventa');
        $holder['usuario_id']=auth()->user()->id;
        $c=Venta::query()->count()+1;
        $holder['numero_documento']="{$empresa->getEmpresa()->id}-00-{$c}";
        $holder['fecha']=date('d-m-Y');
        $holder['documento_id']=1;
        DB::beginTransaction();
        try{
            $venta=Venta::query()->create($holder);
            foreach($productos as $producto){
                $carro['producto_id']=$producto['id'];
                $carro['cantidad']=$producto['cantidad'];
                $carro['precio_unitario']=$producto['precio_unitario'];
                $carro['descuento']=0;
                $venta->carrosVenta()->create($carro);
                $inv=Inventario::query()->where('producto_id',$producto['id'])->where('empresa_id',$empresa->getEmpresa()->id)->first();
                $inv->cantidad=$inv->cantidad-$producto['cantidad'];
                $inv->update();
            }
            DB::commit();
            session()->forget(['carroventa', 'buscaPro', 'totalventa']);
        }catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()
                ->back()
                ->withErrors([
                    'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
                ]);
        }
        return redirect()->route('sales');
    }

    
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->total=0;
        $venta->update();
        return redirect()->route('sales');
    }
    //magia que busca un producto por el codigo y lo añade a session buscaPro
    public function search(Request $request, ProductosRepository $productos)
    {   
        $producto=$productos->getProduct($request->get('codigo'));
        if($producto!=null){
        session(['buscaPro' => $producto]);
        }
        return redirect()->route('newsales');
    }
    //magia que mata todas las session correspondiente a newsales
    public function kill()
    {
        session()->forget(['carroventa', 'buscaPro', 'totalventa']);

        return redirect()->route('newsales');
    }
    //magia que agrega productos a carroventa, en caso de ya existir le añade la cantidad ingresada al producto, actualizando los datos
    public function add(Request $request, ProductosRepository $productos)
    {
        //setea los valores obtenidos de la session y el request
        $cantidad = $request->get('cantidad');
        $total = 0;
        //construye un producto con la cantidad y datos por defecto de la base de datos
        $producto = $productos->getProduct(session('buscaPro')->codigo);
        $inventario = Inventario::query()
            ->where('producto_id', $producto->id)
            ->first();
        $producto['cantidad'] = $inventario['cantidad'];
        //verifica si la sesion con carroventa existe, luego la recorre para buscar coincidencias y añadir cantidad correspondiente
        if (session()->exists('carroventa')) {
            //recorre session carroventa
            foreach (Session::get('carroventa') as $pros) {
                //verifica si hay coincidencia con el producto buscado
                if ($pros['id'] == $producto['id']) {
                    //verifica stock de producto
                    if ($producto['cantidad'] >= ($pros['cantidad'] + $cantidad)) {
                        //suma cantidad correspondiente
                        $pros['cantidad'] = $pros['cantidad'] + $cantidad;
                        //aqui recorre la session carroventa para actualizar el valor total de venta
                        foreach (session('carroventa') as $pro) {
                            $total = $total + ($pro['precio_unitario'] * $pro['cantidad']);
                            session(['totalventa' => $total]);
                        }
                        //elimina la session buscaPro, que se usa para buscar el producto por el codigo
                        session()->forget('buscaPro');
                        return redirect()->route('newsales');
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
            $producto['precio_unitario'] = $inventario['precio_unitario'];
            //lo añade a la session carroventa
            session()->push('carroventa', $producto);
            //aqui recorre la session carroventa para actualizar el valor total de venta
            foreach (session('carroventa') as $pro) {
                $total = $total + ($pro['precio_unitario'] * $pro['cantidad']);
                session(['totalventa' => $total]);
            }
            //elimina la session buscaPro, que se usa para buscar el producto por el codigo
            session()->forget('buscaPro');
            return redirect()->route('newsales');
        } //en caso de no haber stock suficiente, vuelve a la pagina anterior y manda mensaje de producto sin stock
        else {
            return redirect()->route('newsales')->with([
                'message' => 'Producto sin stock suficiente'
            ]);
        }
    }
    //magia que borra un objeto de session carroventa
    public function del(Request $request)
    {
        if (session()->exists('carroventa')) {
        $codigo = $request['codigo'];
        $total = 0;

        $productos = session('carroventa');
        session()->forget(['carroventa','totalventa']);
        //recorre session carroventa
        foreach ($productos as $pros) {
            //verifica si hay coincidencia con el producto buscado
            if ($pros['codigo'] != $codigo) {
                session()->push('carroventa', $pros);
            }
        }
        if (session()->exists('carroventa')) {
            foreach (session('carroventa') as $pro) {
                $total = $total + ($pro['precio_unitario'] * $pro['cantidad']);
                session(['totalventa' => $total]);
            }
        }
        
    }
        return redirect()->route('newsales');
    }

/*
            ______              
       .d$$$******$$$$c.        
    .d$P"            "$$c      
   $$$$$.           .$$$*$.    
 .$$ 4$L*$$.     .$$Pd$  '$b   
 $F   *$. "$$e.e$$" 4$F   ^$b  
d$     $$   z$$$e   $$     '$. 
$P     `$L$$P` `"$$d$"      $$ 
$$     e$$F       4$$b.     $$ 
$b  .$$" $$      .$$ "4$b.  $$ 
$$e$P"    $b     d$`    "$$c$F 
'$P$$$$$$$$$$$$$$$$$$$$$$$$$$  
 "$c.      4$.  $$       .$$   
  ^$$.      $$ d$"      d$P    
    "$$c.   `$b$F    .d$P"     
      `4$$$c.$$$..e$$P"        
          `^^^^^^^`
*/ 
}
