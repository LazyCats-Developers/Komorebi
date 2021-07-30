@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-truck p-3 bg-white rounded-full border"></i> COMPRAS</p>
                    <a href="{{ url('newshop') }}" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-2xl p-2 rounded-full hover:from-green-600 hover:to-green-600 focus:outline-none md:text-xl md:w-40 2xl:w-44 2xl:text-xl">
                        Nueva compra
                    </a>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
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
                <!-- tabla de datos -->
                <div class="bg-white shadow-lg p-3 border-b">
                    <table class="w-full">
                        <thead>
                        <tr class="grid grid-cols-5 md:grid-cols-7 bg-gray-200 border rounded-t-md md:rounded-t-xl text-base 2xl:text-xl">
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th><p class="md:hidden">Cant</p><p class="hidden md:block">Cantidad</p></th>
                            <th class="hidden md:block">Medida</th>
                            <th class="hidden md:block">Descipcion</th>
                            <th>Opcion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="grid grid-cols-5 md:grid-cols-7 border rounded-b-md md:rounded-b-xl text-base 2xl:text-xl">
                        @foreach($productos as $producto)
                                <td class="text-center">{{$producto->codigo}}</td>
                                <td class="text-center">{{$producto->nombre}}</td>
                                <td class="text-center">{{$producto->marca}}</td>
                                <td class="text-center">{{$producto->cantidad}}</td>
                                <td class="hidden md:block text-center">{{$producto->unidad}}</td>
                                <td class="hidden md:block text-center">{{$producto->descripcion}}</td>
                                <td class="flex justify-around">
                                    <a class="btn btn-warning" href="{{ route("productos.edit", $producto) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("productos.destroy", $producto)}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td class="text-center">
                                @endforeach
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
