<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\TipoProducto;
use App\Models\Unidad;
use App\Models\Usuario;
use App\Notifications\ProductoActualizado;
use App\Notifications\ProductoCreado;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ProductosController extends Controller
{
    public function index()
    {
        return view("pages.inventories.index");
    }

    public function create()
    {
        return view("pages.inventories.create", ["tipoproductos" => TipoProducto::all(), "unidades" => Unidad::all()]);
    }

    public function store(Request $request)
    {
        $valid = $this->validate($request, [
            "producto.nombre" => "required|string|max:255",
            "producto.marca" => "required|string|max:255",
            "producto.unidad_id" => "required|numeric",
            "producto.descripcion" => "string|max:255",
            "producto.codigo" => "required|string|max:255",
            "inventario.cantidad" => "required|numeric",
            "inventario.precio_unitario" => "numeric",
            "inventario.costo_unitario" => "numeric",
            "inventario.tipo_producto_id" => "required|numeric|min:1",
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

            return redirect()
                ->back()
                ->withInput($request->input())
                ->withErrors([
                    'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
                ]);
        }

        // Notificar usuarios de la creación
        $usuarios = Usuario::query()->whereHas('colaboradores', fn($query) => $query->where('empresa_id', $empresa->id))->get();
        Notification::send($usuarios, new ProductoCreado());

        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Producto $producto
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
        $productos = Inventario::query()->where('empresa_id', $em->id)->get();

        return $productos;
    }

    public function edit(Producto $producto)
    {
        $inventario = $producto->inventarios()->first();
        return view("pages.inventories.edit", [
            "inventario" => $inventario,
            "producto" => $producto,
            "tipoproductos" => TipoProducto::all(),
            "unidades" => Unidad::all()
        ]);
    }

    public function update(Request $request, Producto $producto)
    {
        $valid = $this->validate($request, [
            "producto.nombre" => "required|string|max:255",
            "producto.marca" => "required|string|max:255",
            "producto.unidad_id" => "required|numeric",
            "producto.descripcion" => "string|max:255",
            "producto.codigo" => "required|string|max:255",
            "inventario.cantidad" => "required|numeric",
            "inventario.precio_unitario" => "numeric",
            "inventario.costo_unitario" => "numeric",
            "inventario.tipo_producto_id" => "required|numeric|min:1",
        ]);

        $usuario = auth()->user();
        $empresa = $usuario->empresas()->firstOrFail();

        DB::beginTransaction();
        try {
            $producto->update($valid['producto']);
            $producto->inventarios()->update($valid['inventario']);
            DB::commit();
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }

        // Notificar usuarios de la actualización
        $usuarios = Usuario::query()->whereHas('colaboradores', fn($query) => $query->where('empresa_id', $empresa->id))->get();
        Notification::send($usuarios, new ProductoActualizado());

        return redirect()->route('inventory.index');
    }

    public function destroy(Producto $producto)
    {
        DB::beginTransaction();
        try {
            $producto->inventarios()
                ->delete();

            $producto
                ->delete();

            DB::commit();
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }

        return redirect()->route('inventory.index');
    }
}

