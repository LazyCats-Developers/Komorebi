<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use DB;

class EmpresasController extends Controller
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
        return view("pages.empresas-create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $empresa = new Empresa($request->input());
        $empresa->saveOrFail();

        return redirect()->action([PagesController::class, 'main'])->with(["mensaje"=>"Empresa agregada exitosamente",]); */

        $usuario = auth()->user();

        $valid = $this->validate($request, [
            "nombre" => "required|string|max:255",
            "direccion" => "string|max:255",
            "telefono" => "string|max:255",
            "email" => "string|max:255",
            "rut" => "string|max:255",
            "descripcion" => "string|max:255",
            "empresa_rrss" => "string|max:255",
        ]);

        DB::beginTransaction();
        try {
            $empresa = Empresa::query()->create($valid);
            $empresa->colaboradores()->create([
                "usuario_id" => $usuario->id,
                "cargo_usuario" => "Administrador",
                "rol_id" => 1
            ]);
            DB::commit();
        } catch(\Exception $exception) {
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
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Display all the resources from the auth user
     */
    public function showAll()
    {
        $usuario = auth()->user();
        $empresas = $usuario->empresas()->get();
        return $empresas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {

        $valid = $this->validate($request, [
            "nombre" => "required|string|max:255",
            "direccion" => "string|max:255",
            "telefono" => "string|max:255",
            "email" => "string|max:255",
            "rut" => "string|max:255",
            "descripcion" => "string|max:255",
            "empresa_rrss" => "string|max:255",
        ]);

        $empresa
            ->update($valid);

        session()->flash('status', [
            'type' => 'success',
            'message' => 'Empresa actualizada.'
        ]);

        return redirect()->route('main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {

        DB::beginTransaction();
        try {

            /**
             * TODO Implementar el borrado de los productos y demas datos relacionados a la empresa
             */
            $empresa->colaboradores()
                ->delete();

            $empresa
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
