<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view("pages.providers.create");
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
            "proveedor.nombre" => "required|string|max:255",
            "proveedor.rut" => "string|max:255",
            "proveedor.telefono" => "string|max:255",
            "proveedor.email" => "string|max_255",
            "proveedor.direccion" => "string|max_255",
            "proveedor.proveedor_rrss" => "string|max_255",
            "proveedor.descripcion" => "string",
        ]);

        Proveedor::create($valid);

        session()->flash('status', [
            'type' => 'success',
            'message' => 'Proveedor creado.'
        ]);

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
        return view('pages.providers.edit');
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
