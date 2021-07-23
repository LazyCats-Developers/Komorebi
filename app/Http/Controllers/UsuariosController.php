<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class UsuariosController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $usuario = auth()->user();

        $valid = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'string|max:255',
            'direccion' => 'string|max:255',
        ]);

        $usuario->update($valid);

        session()->flash('status', [
            'type' => 'success',
            'message' => 'Usuario actualizado.'
        ]);

        return redirect('/profile');
    }

    public function update_avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|mimes:jpeg,bmp,png'
        ]);

        /** @var Usuario $user */
        $user = auth()->user();

        $avatar = $request->file('avatar');
        $filename = 'avatars/' . rand() . '.' . $avatar->getClientOriginalExtension();

        Storage::disk('public')->makeDirectory('avatars');

        Image::load($avatar)
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->optimize()
            ->save(storage_path('app/public/' . $filename));
        $user->avatar = $filename;
        $user->save();

        return redirect()->route('profile')->with([
            'status' => [
                'type' => 'success',
                'message' => 'Avatar Updated'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {

    }
}
