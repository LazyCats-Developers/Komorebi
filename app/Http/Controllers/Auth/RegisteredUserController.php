<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Usuario;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $valid = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'string|max:255',
            'direccion' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
          ]);
          $valid['password'] = Hash::make($valid['password']);
          $user = Usuario::create($valid);

        event(new Registered($user));

        Auth::login($user);

        session()->flash('status', [
            'type' => 'success',
            'message' => 'Usuario ingresado.'
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
