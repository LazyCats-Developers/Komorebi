@extends('layouts.main')

@section('content')
<div class="flex flex-col space-y-5 p-5">
        <a href="{{route('productos.create')}}" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl">
                Crear items
        </a>
        <p>crear el form en views/pages/newitem.blade.php</p>
        

        <p>crear el form en views/pages/edititem.blade.php</p>
        <table class="table table-bordered">
                <thead>
                        <tr>
                                <th>Id</th>
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
@endsection