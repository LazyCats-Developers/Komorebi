@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-house-user p-3 bg-white rounded-full border"></i> PAGINA PRINCIPAL</p>
                </div>
                <div class="bg-white flex flex-col md:flex-row">
                    <div class="w-full md:w-96 py-3">
                        <div class="flex flex-col space-y-1 items-center px-3">
                            <img class="w-60 h-60 rounded-full" src="../img/working.gif">
                            <div class="flex-col">
                                <p>Bienvenido, {{ auth()->user()->nombre }} </p>
                            </div>
                            <div class="flex-col">
                                    @if(auth()->user()->empresas()->exists())
                                       <p>{{ auth()->user()->colaboradores()->first()->cargo_usuario }} de</p>
                                       <p>{{ auth()->user()->empresas()->first()->nombre }}</p>
                                    @else
                                        <p>Aún no tienes empresa registrada</p>
                                    @endif
                            </div>
                            <div class="flex-col w-full">
                                <a href="{{ url('ups') }}" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-2xl px-6 py-2 rounded-full hover:from-green-600 hover:to-green-600 focus:outline-none md:text-xl 2xl:text-xl">
                                    Editar tu empresa
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full border-t md:border-0 py-3">
                        <div class="flex-col px-6 p-3">
                            <p>Opciones Rapidas</p>
                        </div>
                        <div class="flex flex-col p-3">
                            <a href="{{ url('provider') }}" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-2xl p-2 rounded-full hover:from-green-600 hover:to-green-600 focus:outline-none md:text-xl md:w-48 2xl:w-44 2xl:text-xl">
                                Proveedores
                            </a>
                        </div>
                        <div class="flex flex-col space-y-3 p-3">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </div>
    @endif
@endsection
