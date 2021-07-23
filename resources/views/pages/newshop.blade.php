@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <div class="bg-white flex flex-col space-y-3 p-3 border-b md:rounded-t-md">
            <div class="flex flex-col items-center">
                <p>CARRITO DE COMPRAS</p>
            </div>
        </div>
        <div class="bg-white flex flex-row space-x-3 p-3 border-b justify-between">
            <a href="" class="flex justify-center w-full bg-green-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:w-64">
                Crear compra
            </a>
            <a href="" class="flex justify-center w-full bg-red-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-red-600 md:w-64">
                Cancelar compra
            </a>
        </div>
        <div class="bg-white flex flex-col space-y-3 p-3 border-b md:space-y-0 md:space-x-3 md:flex-row md:justify-between">
            <div class="space-y-3 md:space-y-0 md:space-x-3">
                <input type="text" placeholder="Ingresar codigo" class="border border-gray w-full rounded-md py-3 px-4 md:w-64">
                <button class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-40 hover:bg-blue-600">
                    Buscar
                </button>
            </div>
            <div>
                <p class="font-bold">Total compra</p>
                <input type="text" value="700" placeholder="Total compra" class="text-right border border-gray w-full rounded-md py-3 px-4 md:w-64" disabled>
            </div>
        </div>
        <div class="bg-white flex flex-col space-y-3 p-3 border-b md:space-y-0 md:space-x-3 md:flex-row md:justify-between">
            <div class="space-y-3 md:space-y-0 md:space-x-3">
                <input type="text" placeholder="Nombre item" class="border border-gray w-full rounded-md py-3 px-4 md:w-64" disabled>
                <input type="text" placeholder="Valor del item" class="border border-gray w-full rounded-md py-3 px-4 md:w-40" disabled>
                <input type="text" placeholder="Ingresar cantidad" class="border border-gray w-full rounded-md py-3 px-4 md:w-40 ">
            </div>
            <button class="w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md md:w-64 hover:bg-blue-600">
                Agregar item
            </button>
        </div>
        <div class="bg-white space-y-3 py-3 border-b">
            <table class="w-full">
                <thead class="bg-gray-300">
                    <tr class="grid grid-cols-7 justify-items-center">
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>valor</th>
                        <th>Cantidad</th>
                        <th>SubTotal</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="grid grid-cols-7 justify-items-center">
                        <td>9999999</td>
                        <td>Chokita</td>
                        <td>350</td>
                        <td><input type="text" value="2" class="text-center"></td>
                        <td>700</td>
                        <td>
                            <button class="btn btn-warning" href="">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bg-white p-3 md:rounded-b-md">
        </div>
    </div>
@endsection
