<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Repositories\EmpresasRepository;
use App\Repositories\ProductosRepository;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmpresasRepository $empresa)
    {
        $empresa = $empresa->getEmpresa();
        $proveedores = Proveedor::query()->whereHas('transacciones', fn($query) => $query->where('empresa_id', $empresa->id))->get();

        return view("pages.providers.index", [
            "proveedores" => $proveedores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductosRepository $productos)
    {
        return view("pages.providers.create",
            ['productos' => $productos->getProducts()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EmpresasRepository $empresa)
    {
        $valid = $this->validate($request, [
            "proveedor.nombre" => "required|string|max:255",
            "proveedor.rut" => "string|max:255",
            "proveedor.telefono" => "string|max:255",
            "proveedor.email" => "string|max:255",
            "proveedor.direccion" => "string|max:255",
            "proveedor.proveedor_rrss" => "string|max:255",
            "proveedor.descripcion" => "string",
            "transaccion.producto_id" => "numeric",

        ]);

        $empresa = $empresa->getEmpresa();
        $valid['transaccion']['empresa_id'] = $empresa->id;

        DB::beginTransaction();
        try{
            $proveedor = Proveedor::query()->create($valid['proveedor']);
            $proveedor->transacciones()->create($valid['transaccion']);
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

        return redirect()->route('provider.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductosRepository $productos,Proveedor $proveedor)
    {
        $onRecord = $productos->getProviderProduct($proveedor->id);
        $productos = $productos->getProducts();

        //dd($pro, $productos);
        return view('pages.providers.edit', [
            "productos" => $productos,
            "proveedor" => $proveedor,
            "onRecord" => $onRecord
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $valid = $this->validate($request, [
            "proveedor.nombre" => "required|string|max:255",
            "proveedor.rut" => "string|max:255",
            "proveedor.telefono" => "string|max:255",
            "proveedor.email" => "string|max:255",
            "proveedor.direccion" => "string|max:255",
            "proveedor.proveedor_rrss" => "string|max:255",
            "proveedor.descripcion" => "string",
            "transaccion.producto_id" => "numeric",

        ]);

        DB::beginTransaction();
        try{
            $proveedor->update($valid['proveedor']);
            $proveedor->transacciones()->update($valid['transaccion']);
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

        return redirect()->route('provider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        DB::beginTransaction();
        try{

            // $proveedor->transacciones()
            //     ->delete();

            $proveedor
                ->delete();

            DB::commit();

        } catch (Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()
                ->back()
                ->withErrors([
                    'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
                ]);
        }

        return redirect()->route('provider.index');
    }
}
