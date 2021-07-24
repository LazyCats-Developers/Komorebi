<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\TipoProducto;
use App\Models\Unidad;
use Illuminate\Http\Request;
use DB;
use Faker\Core\Number;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("/inventory");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.newitem", ["tipoproductos" => TipoProducto::all(), "unidades" => Unidad::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->validate($request, [

            "producto.nombre"            => "required|string|max:255",
            "producto.marca"             => "required|string|max:255",
            "producto.unidad_id"         => "required|numeric",
            "producto.descripcion"       => "string|max:255",
            "producto.codigo"            => "required|string|max:255",
            "inventario.cantidad"          => "required|numeric",
            "inventario.precio_unitario"   => "numeric",
            "inventario.costo_unitario"    => "numeric",
            "inventario.tipo_producto_id"  => "required|numeric|min:1",

        ]);

        $usuario = auth()->user();
        $empresa = $usuario->empresas()->firstOrFail();

        $valid['inventario']['empresa_id'] = $empresa->id;

        DB::beginTransaction();
        try {
            $producto = Producto::query()->create($valid['producto']);
            $producto->inventarios()->create($valid['inventario']);
        DB::commit();
    } catch (\Exception $exception) {
        report($exception);
        DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }

        return redirect('/inventory');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    public function showAll()
    {
        $usuario = auth()->user();
        $em = $usuario->empresas()->first();
        $productos = Inventario::query()->where('empresa_id', $em->id )->get();

        return $productos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $inventario = $producto->inventarios()->first();
        return view("pages.edititem", ["inventario" => $inventario, "producto" => $producto, "tipoproductos" => TipoProducto::all(), "unidades" => Unidad::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $valid = $this->validate($request, [
            "nombre" => "required|string|max:255",
            "marca" => "required|string|max:255",
            "unidad_id" => "required|numeric",
            "descripcion" => "string|max:255",
            "codigo" => "required|string|max:255",
            "cantidad" => "numeric",
            "precio_unitario" => "numeric",
            "costo_unitario"    => "numeric",
            "tipo_producto_id" => "required|numeric|min:1",
        ]);
        DB::beginTransaction();
        try {
            $producto->update($valid);
            $producto->inventarios()->update([
                "cantidad" => $valid['cantidad'] ,
                "tipo_producto_id" => $valid['tipo_producto_id'] ,
                "precio_unitario" => $valid['precio_unitario'] ,
                "costo_unitario" => $valid['costo_unitario'] ,
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }
        return redirect('/inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        DB::beginTransaction();
        try {
            $producto->inventarios()
                ->delete();

            $producto
                ->delete();

            DB::commit();
        } catch(\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }

        return redirect('/inventory');
    }
}

