@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-3">
            <div>
                <div class="bg-white grid-col p-3 border-b md:rounded-t-md">
                    <p>COMPRAS</p>
                </div>
                <div class="bg-white flex flex-row-reverse p-3 border-b">
                    <a href="" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-md">
                        Crear compra
                    </a>
                </div>
                <div class="bg-white grid grid-col space-y-3 p-3 border-b">
                    <p>Consulta de ventas</p>
                    <table class="">
                        <thead class="bg-gray-300">
                            <tr>
                                <th>ID</th>
                                <th>fecha</th>
                                <th>hora</th>
                                <th>valor</th>
                                <th>vendedor</th>
                                <th>tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-white grid-col p-3 md:rounded-b-md">
                </div>
            </div>
        </div>
    @endif
@endsection
