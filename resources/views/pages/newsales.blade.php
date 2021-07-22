@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <div class="bg-white flex flex-col space-y-3 p-3 border-b md:rounded-t-md">
            <div>
                <p>CARRITO DE VENTAS</p>
            </div>
        </div>
        <div class="bg-white flex flex-col space-y-3 p-3">
            <div class="grid grid-col space-y-3 flex justify-items-center md:grid-cols-2 md:space-y-0 md:space-x-3">
                <a href="" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-red-600 md:max-w-md">
                    Cancelar venta
                </a>
                <a href="" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-md">
                    Crear venta
                </a>
            </div>
        </div>
        <div class="bg-white flex flex-col space-y-3 p-3 md:rounded-md">
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
@endsection
