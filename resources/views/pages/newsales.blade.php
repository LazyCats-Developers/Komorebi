@extends('layouts.main')

@section('content')
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <div  class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <p class="font-bold text-xl"><i class="fas fa-cart-plus p-3 bg-white rounded-full border"></i> CREAR VENTA</p>
                    </div>
                    <div class="flex flex-row gap-3">
                        <button class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72">
                            Ingresar venta
                        </button>
                        <button class="flex justify-center w-full bg-gradient-to-r from-red-300 to-red-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72">
                            Cancelar
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-64">
                        <button class="bg-blue-400 w-full text-white p-3 rounded-3xl md:rounded-r-full md:w-36 hover:bg-blue-500">
                            Buscar item
                        </button>
                    </div>
                    <div class="flex flex-row gap-2">
                        <p class="w-24 placeholder-gray-400 px-6 py-3 border border-gray-300 text-center md:rounded-l-full">Total</p>
                        <input type="text" value="700" placeholder="Total Compra" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-right md:rounded-r-full md:w-40" disabled>
                    </div>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Nombre item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-40" disabled>
                        <input type="text" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:w-40" disabled>
                        <input type="text" placeholder="Ingresar Cantidad" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-r-full md:w-44">
                    </div>
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500">
                            Agregar item
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 border-b">
                    <table class="w-full">
                        <thead>
                            <tr class="grid grid-cols-7 justify-items-center bg-gray-100 border rounded-t-3xl">
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
                            <tr class="grid grid-cols-7 justify-items-center border rounded-b-3xl">
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
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </div>
    </div>
@endsection
