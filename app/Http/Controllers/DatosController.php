<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("datos");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $valid=$this->validate($request, [
            "nombre"=>"required|string|max:30",
            "dato"=>"required|string|max:20",
        ]);
        DB::beginTransaction();
        try{
            $dato=Datos::query()->create($valid);
            return view("login");
        }catch(\Exception $exception){
            report($exception);
            DB::rollBack();
            return view("signup");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function show(Datos $datos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function edit(Datos $datos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datos $datos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datos $datos)
    {
        //
    }
}
