<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Repositories\EmpresasRepository;
use App\Repositories\ProductosRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.providers.index");
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
    public function edit(Proveedor $proveedor)
    {
        $transaccion = $proveedor->transacciones()->first();
        return view('pages.providers.edit', [
            "transaccion" => $transaccion,
            "proveedor" => $proveedor
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
            "proveedor.email" => "string|max_255",
            "proveedor.direccion" => "string|max_255",
            "proveedor.proveedor_rrss" => "string|max_255",
            "proveedor.descripcion" => "string",
        ]);

        $proveedor->update($valid);

        session()->flash('status', [
            'type' => 'success',
            'message' => 'Datos de proveedor actualizados.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
    }
}
