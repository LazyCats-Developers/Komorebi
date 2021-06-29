<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use DB;

class ColaboradoresController extends Controller
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
    public function store(Request $request, $id){

        $valid = $this->validate($request, [
            "email" => "required|string|max:255",
            "cargo_usuario" => "required|string|max:255",
        ]);

        $usuario = auth()->user();
    
        $colaborador = Usuario::query()->where('email', $valid['email'])->first();

        if (!$colaborador) {
            # TODO implemetar el cambio de view a la creacion de usuario por no encontrar mail registrado
            // Volver al formulario indicando que debe crear el usuario primero
            return redirect()->back()->with([
                'causa' => 'FALTA_USUARIO',
                'mensaje' => 'Debe crear un usuario...'
            ]);                
        }

        $empresa = $usuario->empresas()->find($id);
        $empresa->colaboradores()->create([
            "colaborador_id" => $colaborador->id,
            "cargo_usuario" => $valid['cargo_usuario'],
            "rol_id" => 2
        ]);
        
        session()->flash('status', [
            'type' => 'success',
            'message' => 'Colaborador ingresado.'
        ]);

        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show(Colaborador $colaborador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function edit(Colaborador $colaborador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colaborador $colaborador)
    {
        $valid = $this->validate($request, [
            "cargo_usuario" => "required|string|max:255",
            "rol_id" => "required|digits"
        ]);
        
        $colaborador->update([
            "cargo_usuario" => $valid['cargo_usuario'],
            "rol_id" => $valid['rol_id']
        ]);

        session()->flash('status', [
            'type' => 'success',
            'message' => 'Datos de colaborador actualizados.'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaborador $colaborador)
    {
        //
    }
}
