<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
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
        return view("pages.inventory", ["productos" => Producto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.newitem", ["tipoproductos" => TipoProducto::all()]);
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
        $em = $usuario->empresas()->first();
        DB::beginTransaction();
        try {
            $producto = Producto::query()->create($validp);
            $producto->inventarios()->create([
                "cantidad" => $request->cantidad,
                "precio_unitario" => $request->precio_unitario,
                "tipo_producto_id" => $request->tipo_producto_id,
                "empresa_id" => $em->id

            ]);
            DB::commit();
        } catch (\Exception $exception) {
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
        $inventario = $producto->inventarios()->first();
        return view("pages.edititem", ["inventario" => $inventario, "producto" => $producto, "tipoproductos" => TipoProducto::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto, Inventario $inventario)
    {
        $valid = $this->validate($request, [
            "nombre" => "required|string|max:255",
            "marca" => "required|string|max:255",
            "unidad" => "required|string|max:255",
            "descripcion" => "required|string|max:255",
            "codigo" => "required|string|max:255",
            "cantidad" => "required|numeric",
            "precio_unitario" => "required|numeric",
            "tipo_producto_id" => "required|numeric|min:1",
        ]);
        $validi = $this->validate($request, [
            
            "cantidad" => "required|numeric",
            "precio_unitario" => "required|numeric",
            "tipo_producto_id" => "required|numeric|min:1",
        ]);
        DB::beginTransaction();
        try {
            $producto->update($valid);
            $producto->inventarios()->update($validi);
            DB::commit();
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }
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
    }
}
