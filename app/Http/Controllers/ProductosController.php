<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.inventory", ["productos"=>Producto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.newitem",["tipoproductos"=>TipoProducto::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validp = $this->validate($request, [
            "nombre" => "required|string|max:255",
            "marca" => "required|string|max:255",
            "unidad" => "required|string|max:255",
            "descripcion" => "required|string|max:255",
            "codigo" => "required|string|max:255",

            


        ]);
        $usuario = auth()->user();
        $em=$usuario->empresas()->first();
        DB::beginTransaction();
        try{
        $producto = Producto::query()->create($validp);
        $producto->inventarios()->create([
            "cantidad" => $request->cantidad,
            "precio_unitario" => $request->precio_unitario,
            "tipo_producto_id" => $request->tipo_producto_id,
            "empresa_id" => $em->id

        ]);
        DB::commit();
        }catch(\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view("pages.edititem",["tipoproductos"=>TipoProducto::all()]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
