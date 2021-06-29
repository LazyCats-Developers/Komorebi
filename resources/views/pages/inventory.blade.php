@extends('layouts.main')

@section('content')
<div class="flex flex-col md:p-3">

        <div>
                <div class="bg-white grid-col p-3 border-b md:rounded-t-md">
                        <p>INVENTARIO</p>
                </div>
                <div class="bg-white grid-col space-y-3 p-3 pb-5 border-b">
                        <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                                <a href="{{route('productos.create')}}" class="flex justify-center w-auto h-auto bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl md:w-60">
                                        Crear items
                                </a>
                        </div>
                </div>
                <div class="bg-white grid grid-col space-y-3 p-3 border-b">
                        <p>Consulta de items</p>
                        <table class="">
                                <thead class="bg-gray-300">
                                        <tr>
                                                <th>ID</th>
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
                                        <tr>
                                                <td>{{$producto->id}}</td>
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
                        <div class="flex flex-row justify-around space-x-3">
                        </div>
                </div>
        </div>
</div>
@endsection