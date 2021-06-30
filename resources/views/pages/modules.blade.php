@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-3">
            <div class="bg-white grid-col p-3 border-b md:rounded-t-md">
                <p>MODULOS</p>
            </div>
            <div class="bg-white flex flex-row-reverse p-3 border-b">
                <a href="" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-md">
                    Agregar
                </a>
            </div>
            <div class="bg-white grid grid-col space-y-3 p-3 border-b">
                <p>Tus modulos</p>
            </div>
            <div class="bg-white grid-col p-3 md:rounded-b-md">
            </div>
        </div>
    @endif
@endsection
