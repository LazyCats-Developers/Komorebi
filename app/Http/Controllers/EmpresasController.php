<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresasController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view("pages.empresas-create");
    }

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
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()
                ->withInput($request->input())
                ->withErrors([
                    'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
                ]);
        }

        return redirect('/main');
    }

    public function show(Empresa $empresa)
    {
        //
    }

    public function showAll()
    {
        $usuario = auth()->user();
        $empresas = $usuario->empresas()->get();
        return $empresas;
    }

    public function edit(Empresa $empresa)
    {
        //
    }

    public function update(Request $request)
    {
        $empresa = auth()->user()->empresas()->firstOrFail();

        $valid = $this->validate($request, [
            "nombre" => "required|string|max:255",
            "direccion" => "string|max:255",
            "telefono" => "string|max:255",
            "email" => "string|max:255",
            "rut" => "string|max:255",
            "descripcion" => "string|max:255",
            "empresa_rrss" => "string|max:255",
        ]);

        $empresa->update($valid);

        return redirect('/main')->with([
            'status' => [
                'type' => 'success',
                'message' => 'Empresa actualizada.'
            ]
        ]);
    }

    public function updateLogo(Request $request)
    {
        //implementar el cambio de logo de empresa
        $empresa = auth()->user()->empresas()->first();
    }

    public function destroy(Empresa $empresa)
    {
        DB::beginTransaction();
        try {
            /**
             * TODO Implementar el borrado de los productos y demas datos relacionados a la empresa
             * NOTE: Cambiar como manejan estos productos mediante el uso de "cascade"
             */
            $empresa->colaboradores()
                ->delete();

            $empresa
                ->delete();

            DB::commit();
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Ocurrio el siguiente error: ' . $exception->getMessage()
            ]);
        }

        return redirect()->route('main');
    }
}
