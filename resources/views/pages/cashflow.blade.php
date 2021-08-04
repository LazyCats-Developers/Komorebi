@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-chart-line p-3 bg-white rounded-full border"></i> FINANZAS</p>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 p-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-row">
                        <p class="w-24 placeholder-gray-400 px-6 py-3 border border-gray-300 text-center md:rounded-l-full">Ingresos</p>
                        <input type="text" value="+{{$resultados['ingresos']}}" placeholder="Total Compra" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-right md:rounded-r-full md:w-40" disabled>
                    </div>
                    <div class="flex flex-row">
                        <p class="w-24 placeholder-gray-400 px-6 py-3 border border-gray-300 text-center md:rounded-l-full">Egresos</p>
                        <input type="text" value="-{{$resultados['egresos']}}" placeholder="Total Compra" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-right md:rounded-r-full md:w-40" disabled>
                    </div>
                    <div class="flex flex-row">
                        <p class="w-24 placeholder-gray-400 px-6 py-3 border border-gray-300 text-center md:rounded-l-full">Utilidad</p>
                        <input type="text" value="{{$resultados['utilidad']}}" placeholder="Total Compra" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-right md:rounded-r-full md:w-40" disabled>
                    </div>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 p-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Codigo item" class="w-full placeholder-gray-400 text-xl px-5 py-3 border border-gray-300 md:w-36 md:text-base md:rounded-l-full 2xl:w-40 2xl:text-xl">
                        <button class="bg-blue-400 w-full text-white text-2xl p-3 rounded-3xl md:text-base md:rounded-r-full md:w-36 hover:bg-blue-500 2xl:w-40 2xl:text-xl">
                            Buscar item
                        </button>
                    </div>
                    <!-- busqueda y filtros -->
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white text-2xl py-3 px-5 rounded-l-full hover:bg-blue-500 md:w-20 md:text-base 2xl:w-24 2xl:text-xl">
                            Semana
                        </button>
                        <button class="w-full bg-blue-400 text-white text-2xl py-3 px-5 hover:bg-blue-500 md:text-base md:w-20 md:text-base 2xl:w-24 2xl:text-xl">
                            Mes
                        </button>
                        <button class="w-full bg-blue-400 text-white text-2xl py-3 px-5 rounded-r-full hover:bg-blue-500 md:w-20 md:text-base 2xl:w-24 2xl:text-xl">
                            Año
                        </button>
                    </div>
                </div>
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </div>
    @endif
@endsection
