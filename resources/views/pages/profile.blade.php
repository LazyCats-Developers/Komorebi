@extends('layouts.main')

@section('content')
    @if(session('status'))
        <div>
            {{ session('status')['message'] }}
        </div>
    @endif

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:p-3">
        <div class="bg-white p-3 border-b md:rounded-t-md">
            <p>INFORMACION DE LA CUENTA</p>
        </div>
        <div class="bg-white flex flex-cols-2 space-y-3 p-3 pb-5 border-b">
            <form enctype="multipart/form-data" action="{{ route('profile.change-avatar') }}" method="POST">
                @csrf
                <div class="w-96 grid grid-col space-y-3 justify-items-center">
                    <img class="w-60 rounded-full" src="{{ auth()->user()->avatar_url }}">
                    <input class="bg-gray-100 w-60" type="file" name="avatar">
                    <input class="min-w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md sm: hover:bg-green-600" type="submit">
                </div>
            </form>
            <div class="p-3">
                <h2> Perfil de {{$user->nombre}} </h2>

                <div class="w-full bg-white flex-col flex justify-center items-center sm:w-96 sm:rounded-xl">
                    <form class="space-y-5" action="" method="POST">
                        @csrf
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="border border-gray w-full rounded-md py-3 px-4">
                        <input type="text" id="apellido" name="apellido" placeholder="Apellido" class="border border-gray w-full rounded-md py-3 px-4">
                        <input type="text" id="telefono" name="telefono" placeholder="Telefono" class="border border-gray w-full rounded-md py-3 px-4">
                        <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="border border-gray w-full rounded-md py-3 px-4">
                        <input type="text" id="email" name="email" placeholder="Correo electrónico" class="border border-gray w-full rounded-md py-3 px-4">
                        <input type="password" id="password" name="password" placeholder="Contraseña" class="border border-gray w-full rounded-md py-3 px-4">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" class="border border-gray w-full rounded-md py-3 px-4">
                        <button type="submit" class="min-w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600">
                            Actualizar datos
                        </button>
                    </form>
                </div>

            </div>
        </div>
        <div class="bg-white grid-col p-3 md:rounded-b-md">
            <div class="flex flex-row justify-around space-x-3">
            </div>
        </div>
    </div>

@endsection
