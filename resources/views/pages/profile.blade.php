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
        <div class="bg-white grid-col p-3 border-b border-gray-300 md:rounded-t-md">
            <p>INFORMACION DE LA CUENTA</p>
        </div>
        <div class="bg-white flex flex-col md:flex-row md:rounded-b-md">
            <div class="w-96 p-3 py-5">
                <form enctype="multipart/form-data" action="{{ route('profile.change-avatar') }}" method="POST">
                @csrf
                    <div class="flex flex-col space-y-3 items-center">
                        <img class="w-60 rounded-full" src="{{ auth()->user()->avatar_url }}">
                        <input class="bg-gray-100 w-60" type="file" name="avatar">
                        <input class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-60 hover:bg-green-600" type="submit">
                    </div>
                </form>
            </div>
            <div class="w-full">
                <form action="{{ route('profile.update')}}" method="POST">
                @csrf
                    <div class="flex-col p-3">
                        <p>Datos personales</p>
                    </div>
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-5 p-3">
                        <input type="text" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}" class="border border-gray w-full rounded-md py-3 px-4">
                        <input type="text" id="apellido" name="apellido" value="{{ auth()->user()->apellido }}" class="border border-gray w-full rounded-md py-3 px-4">
                    </div>
                    <div class="flex-col px-3 pt-3">
                        <p>Datos de Contactos</p>
                    </div>
                    <div class="flex flex-col space-y-3 p-3">
                        <p class="text-gray-400 p-3">{{ auth()->user()->email}}</p>
                        <input type="text" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}" class="border border-gray w-full rounded-md py-3 px-4">
                    </div>
                    <div class="flex flex-col space-y-3 p-3">
                        <input type="text" id="direccion" name="direccion" value="{{ auth()->user()->direccion }}" class="border border-gray w-full rounded-md py-3 px-4">
                    </div>
                    <div class="flex flex-col space-y-3 p-3 items-center">
                        <button type="submit" class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-60 hover:bg-green-600">
                            Actualizar datos
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
