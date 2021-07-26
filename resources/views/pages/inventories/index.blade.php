@extends('layouts.main')

@section('content')

    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-clipboard-list p-3 bg-white rounded-full border"></i> INVENTARIO</p>
                    <a href="{{route('productos.create')}}"
                       class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-md rounded-full hover:from-green-600 hover:to-green-600 focus:outline-none p-2 sm:w-36 2xl:text-lg 2xl:w-44">
                        Crear item
                    </a>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-sm sm:rounded-l-full sm:w-32 2xl:text-lg">
                        <button class="bg-blue-400 w-full text-white p-3 rounded-3xl sm:rounded-r-full sm:w-32 text-sm hover:bg-blue-500 2xl:text-lg">
                            Buscar item
                        </button>
                    </div>
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-l-full text-sm hover:bg-blue-500 sm:w-20 2xl:text-lg">
                            Semana
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 text-sm hover:bg-blue-500 sm:w-20 2xl:text-lg">
                            Mes
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-r-full text-sm hover:bg-blue-500 sm:w-20 2xl:text-lg">
                            Año
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Nombre item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-sm sm:rounded-l-full sm:w-36 2xl:text-lg" disabled>
                        <input type="text" placeholder="Marca item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-sm sm:w-32 2xl:text-xl" disabled>
                        <input type="text" placeholder="Cantidad" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-sm sm:rounded-r-full sm:w-28 2xl:text-xl" disabled>
                    </div>
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-full text-sm hover:bg-blue-500 sm:w-36 2xl:text-xl 2xl:w-44">
                            Detalles item
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 border-b">
                    <table class="w-full">
                        <thead>
                        <tr class="grid grid-cols-7 justify-items-center bg-gray-100 border rounded-t-3xl sm:text-xs xl:text-sm 2xl:text-lg">
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Descripcion</th>
                            <th>Unidad</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="grid grid-cols-7 justify-items-center border rounded-b-3xl sm:text-xs xl:text-sm 2xl:text-lg">
                            @foreach($productos as $producto)
                                <td>{{$producto->codigo}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->marca}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->unidad_id}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route("productos.edit", $producto) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route("productos.destroy", $producto)}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
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
