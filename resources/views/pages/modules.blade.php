@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-plus-square p-3 bg-white rounded-full border"></i> MODULOS</p>
                    <a href="{{ url('ups') }}" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-2xl p-2 rounded-full hover:from-green-600 hover:to-green-600 focus:outline-none md:text-xl md:w-44 2xl:w-48 2xl:text-xl">
                        Agregar modulos
                    </a>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 p-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <p>Tus modulos</p>
                    </div>
                </div>
                <div class="bg-white shadow-lg grid grid-col gap-3 p-3 md:grid-cols-2">
                        <a href="{{ url('sales') }}" class="flex justify-center bg-blue-400 w-full text-white text-2xl p-3 rounded-3xl md:text-base md:rounded-full hover:bg-blue-500 2xl:text-xl">
                            Ventas
                        </a>
                        <a href="{{ url('shopping') }}" class="flex justify-center bg-blue-400 w-full text-white text-2xl p-3 rounded-3xl md:text-base md:rounded-full hover:bg-blue-500 2xl:text-xl">
                            Compras
                        </a>
                        <a href="{{ url('inventory') }}" class="flex justify-center bg-blue-400 w-full text-white text-2xl p-3 rounded-3xl md:text-base md:rounded-full hover:bg-blue-500 2xl:text-xl">
                            Inventario
                        </a>
                        <a href="{{ url('cashflow') }}" class="flex justify-center bg-blue-400 w-full text-white text-2xl p-3 rounded-3xl md:text-base md:rounded-full hover:bg-blue-500 2xl:text-xl">
                            Finazas
                        </a>
                </div>
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </div>
    @endif
@endsection
