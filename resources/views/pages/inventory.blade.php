@extends('layouts.main')

@section('content')
<div class="flex flex-col space-y-5 p-5">
        <a href="{{route('productos.create')}}" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl">
                Crear items
        </a>
        <p>crear el form en views/pages/newitem.blade.php</p>
        <a href="{{route('productos.edit')}}" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl">
                Editar items
        </a>
        <p>crear el form en views/pages/edititem.blade.php</p>
        <form method="POST" action="">
                @csrf
                <div class="form-group">
                        <input name="nombre" type="text" placeholder="Nombre">
                        <input name="codigo" type="text" placeholder="Codigo">
                        <input name="marca" type="text" placeholder="Marca">
                        <input name="cantidad" type="text" placeholder="Cantidad">
                        <input name="unidad" type="text" placeholder="Unidad">
                        <input name="precio" type="text" placeholder="Precio">
                        <select name="tipo">
                                <option value=0 selected>Tipo</option>
                        </select>
                        <input name="descripcion" type="text" placeholder="Descripcion">
                        <a class="btn btn-primary" href="{{route('tipoproductos.create')}}">Añadir opcion</a>
                </div>
                <button class="btn btn-success">Guardar</button>
        </form>
</div>
@endsection