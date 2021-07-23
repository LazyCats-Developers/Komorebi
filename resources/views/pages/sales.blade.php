@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-3">
            <div class="bg-white grid-col p-3 border-b md:rounded-t-md">
                <p class="font-bold"><i class="fas fa-cash-register mr-3"></i> VENTAS</p>
            </div>
            <div class="bg-white flex flex-row p-3 border-b">
                <a href="{{ url('newsales') }}" class="flex justify-center w-full bg-green-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:w-64">
                    Nueva venta
                </a>
            </div>
            <div class="bg-white flex flex-row p-3 border-b">
                <p>Consulta de ventas</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 border-b md:space-y-0 md:space-x-3 md:flex-row md:justify-between">
                <div class="space-y-3 md:space-y-0 md:space-x-3">
                    <input type="text" placeholder="Codigo item" class="border border-gray w-full rounded-md py-3 px-4 md:w-64">
                    <button class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-64 hover:bg-blue-600">
                        Buscar item
                    </button>
                </div>
                <div class="flex flex-row space-x-3">
                    <button class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-32 hover:bg-blue-600">
                        Semana
                    </button>
                    <button class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-32 hover:bg-blue-600">
                        Mes
                    </button>
                    <button class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-32 hover:bg-blue-600">
                        Año
                    </button>
                </div>
            </div>
            <div class="bg-white space-y-3 py-3 border-b">
                <table class="w-full">
                    <thead class="bg-gray-300">
                        <tr class="grid grid-cols-6 justify-items-center">
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Valor</th>
                            <th>Vendedor</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="grid grid-cols-6 justify-items-center">
                            <td>1111111</td>
                            <td>01/01/0001</td>
                            <td>01:01</td>
                            <td>1000</td>
                            <td>Yisus</td>
                            <td>Factura</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-white p-3 md:rounded-b-md">
            </div>
        </div>
    @endif
@endsection
