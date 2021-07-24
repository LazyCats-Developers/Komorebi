@extends('layouts.main')

@section('content')

    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-clipboard-list p-3 bg-white rounded-full border"></i> INVENTARIO</p>
                    <a href="{{route('productos.create')}}"
                       class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72">
                        Crear item
                    </a>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-72">
                        <button class="bg-blue-400 w-full text-white p-3 rounded-3xl md:rounded-r-full md:w-36 hover:bg-blue-500">
                            Buscar item
                        </button>
                    </div>
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-l-full md:w-24 hover:bg-blue-500">
                            Semana
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 md:w-24 hover:bg-blue-500">
                            Mes
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-r-full  md:w-24 hover:bg-blue-500">
                            Año
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Nombre item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-36" disabled>
                        <input type="text" placeholder="Marca item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:w-36" disabled>
                        <input type="text" placeholder="Cantidad item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-r-full md:w-36" disabled>
                    </div>
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-full md:w-48 hover:bg-blue-500">
                            Detalles item
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 border-b">
                    <table class="w-full">
                        <thead>
                        <tr class="grid grid-cols-7 justify-items-center bg-gray-100 border rounded-t-3xl">
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
                        <tr class="grid grid-cols-7 justify-items-center border rounded-b-3xl">
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
