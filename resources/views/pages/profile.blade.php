@extends('layouts.main')

@section('content')
    @if(session('status'))
        <div class="hidden">
            {{ session('status')['message'] }}
        </div>
    @endif

    @if($errors->any())
        <div class="hidden">
            <ul>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:p-5 items-center">
        <div class="w-full max-w-7xl">
            <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                <p class="font-bold text-xl"><i class="fas fa-user-edit p-3 bg-white rounded-full border"></i> INFORMACION DE LA CUENTA</p>
            </div>
            <div class="bg-white flex flex-col md:flex-row">
                <div class="w-full md:w-96 p-3 py-5">
                    <form enctype="multipart/form-data" action="{{ route('profile.change-avatar') }}" method="POST">
                    @csrf
                        <div class="flex flex-col gap-3 items-center">
                            <img class="w-60 h-60 border rounded-full" src="{{ auth()->user()->avatar_url }}">
                            <label class="w-full bg-blue-400 text-white text-center py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500">
                                <input class="hidden" type="file" name="avatar"> Buscar imagen
                            </label>

                            <input class="w-full bg-blue-400 text-white py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500" type="submit">
                        </div>
                    </form>
                </div>
                <div class="w-full">
                    <form action="{{ route('profile.update')}}" method="POST">
                    @csrf
                        <div class="flex-col p-3">
                            <p>Datos personales</p>
                        </div>
                        <div class="flex flex-col gap-3 p-3 lg:flex-row">
                            <input type="text" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}" class="border border-gray w-full rounded-xl py-3 px-4">
                            <input type="text" id="apellido" name="apellido" value="{{ auth()->user()->apellido }}" class="border border-gray w-full rounded-xl py-3 px-4">
                        </div>
                        <div class="flex-col p-3">
                            <p>Datos de Contactos</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-400 p-3 pl-7">{{ auth()->user()->email}}</p>
                        </div>
                        <div class="flex flex-col gap-3 p-3 lg:flex-row">
                            <input type="text" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}" class="border border-gray w-full rounded-xl py-3 px-4">
                            <input type="text" id="direccion" name="direccion" value="{{ auth()->user()->direccion }}" class="border border-gray w-full rounded-xl py-3 px-4">
                        </div>
                        <div class="flex flex-col p-3 items-center">
                            <button type="submit" class="w-full bg-blue-400 text-white py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500">
                                Actualizar datos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                <p class="text-center text-gray-400">Komorebi</p>
            </div>
        </div>
    </div>

@endsection
