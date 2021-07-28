@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-chart-line p-3 bg-white rounded-full border"></i> FINANZAS</p>
                    <a href="" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72 invisible">
                        Nueva venta
                    </a>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <div>
                            <img class= "w-24 h-24 rounded-full" src="../img/working.gif" alt="">
                        </div>
                        <div class="md:w-80">
                            <p>Bienvenido, {{ auth()->user()->nombre }} </p>
                            <p>
                            @if(auth()->user()->empresas()->exists())
                                {{ auth()->user()->colaboradores()->first()->cargo_usuario }} de {{ auth()->user()->empresas()->first()->nombre }}
                            @else
                                Aún no tienes empresa registrada
                            @endif
                            </p>
                            <a href="{{ route('profile') }}">
                                <p class="text-sm text-blue-500">Editar tu perfil</p>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex w-full bg-white md:rounded-md p-3">
                            <div class="w-full bg-blue-400 text-white py-3 px-6 rounded-l-full md:w-24 hover:bg-blue-500">
                                <i class="fas fa-exclamation-circle"></i>
                                <p class="invisible md:visible">Notificación!</p>
                            </div>
                            <div class="w-full bg-blue-400 text-white py-3 px-6 md:w-24 hover:bg-blue-500">
                                <i class="fas fa-exclamation-circle"></i>
                                <p class="invisible md:visible">Notificación!</p>
                            </div>
                            <div class="w-full bg-blue-400 text-white py-3 px-6 rounded-r-full  md:w-24 hover:bg-blue-500">
                                <i class="fas fa-exclamation-circle"></i><br>
                                <p class="invisible md:visible">Notificación!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 border-b">
                    <a href="{{ url('provider') }}">Crear proovedor</a>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 border-b">
                    <table class="w-full">
                        <thead>
                            <tr class="grid grid-cols-6 justify-items-center bg-gray-100 border rounded-t-3xl">
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Valor</th>
                                <th>Vendedor</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="grid grid-cols-6 justify-items-center border rounded-b-3xl">
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
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </div>
    @endif
@endsection
