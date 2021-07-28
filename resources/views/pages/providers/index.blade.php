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
    <div class="flex flex-col md:p-5 items-center">
        <div class="w-full max-w-7xl">
            <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                <p class="font-bold text-xl"><i class="fas fa-user-edit p-3 bg-white rounded-full border"></i> CREACION DE PROVEEDOR</p>
                <a href="" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72 invisible">
                    Actualizar datos
                </a>
            </div>
            <div class="bg-white  shadow-lg flex flex-col">
                <button>Crear proovedor</button>
                <button>Editar proovedor</button>
            </div>
            <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                <p class="text-center text-gray-400">Komorebi</p>
            </div>
        </div>
    </div>

@endsection
