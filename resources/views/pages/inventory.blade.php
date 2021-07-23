@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-3">
            <div>
                <div class="bg-white grid-col p-3 border-b md:rounded-t-md">
                    <p class="font-bold">INVENTARIO</p>
                </div>
                <div class="bg-white flex flex-row p-3 border-b">
                    <a href="{{route('productos.create')}}" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:w-64">
                        Crear item
                    </a>
                </div>
                <div class="bg-white flex flex-row p-3 border-b">
                    <p>Consulta de inventario</p>
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
                    <table class="overflow-x-auto w-full">
                        <thead class="bg-gray-300">
                            <tr class="grid grid-cols-7 justify-items-center">
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Marca</th>
                                <th>Description</th>
                                <th>Unidad</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr class="grid grid-cols-7 justify-items-center">
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->codigo}}</td>
                                <td>{{$producto->marca}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->unidad}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route("productos.edit",[$producto])}}">
                                            <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route("productos.destroy", [$producto])}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-white grid-col p-3 md:rounded-b-md">
                </div>
            </div>
        </div>
    @endif
@endsection
