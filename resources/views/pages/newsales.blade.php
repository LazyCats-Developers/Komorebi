@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <div class="bg-white flex flex-col space-y-3 p-3 border-b md:rounded-t-md">
            <div class="flex flex-col items-center">
                <p>CARRITO DE VENTAS</p>
            </div>
        </div>
        <div class="bg-white flex flex-row space-x-3 p-3 border-b">
            <a href="" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-md">
                Crear venta
            </a>
            <a href="" class="flex justify-center w-full bg-red-300 text-white font-semibold py-3 px-6 rounded-md hover:bg-red-600 md:max-w-md">
                Cancelar venta
            </a>
        </div>
        <div class="bg-white flex flex-col space-y-3 p-3 border-b md:space-y-0 md:space-x-3 md:flex-row">
            <input type="text" class="border border-gray w-full rounded-md py-3 px-4 md:w-60">
            <button class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-60 hover:bg-green-600">
                buscar
            </button>
        </div>
        <div class="bg-white space-y-3 p-3">
            <table class="w-full">
                <thead class="bg-gray-300">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>valor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>002525</td>
                        <td>Chokita</td>
                        <td>350</td>
                        <td>
                            <a class="btn btn-warning" href="">
                                    <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bg-white p-3 md:rounded-b-md">
        </div>
    </div>
@endsection
