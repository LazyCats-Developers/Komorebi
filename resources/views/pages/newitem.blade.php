@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <div class="bg-gray-400 grid-col p-3 md:rounded-t-md">
            <p class="text-white">CREAR ITEM</p>
        </div>
        <form method="POST" action="{{route('productos.store')}}">
            @csrf
            <div class="bg-white flex flex-col space-y-3 p-3 border-b border-gray-300">
                <input  name="nombre" type="text" placeholder="Nombre" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                <input  name="codigo" type="text" placeholder="Codigo" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                <input  name="marca" type="text" placeholder="Marca" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                <input  name="cantidad" type="text" placeholder="Cantidad" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                <input  name="unidad" type="text" placeholder="Unidad" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                <input  name="descripcion" type="text" placeholder="Descripcion" class="border border-gray w-auto rounded-md py-3 px-4">
                <input  name="precio_unitario" type="text" placeholder="Precio" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                <select name="tipo_producto_id" class="border border-gray w-auto rounded-md py-3 px-4">
                    <option value="0" selected>Tipo</option>
                    @foreach ($tipoproductos as $tp)
                    <option value="{{$tp->id}}" >{{$tp->nombre}}</option>
                    @endforeach
                </select>
                <a href="{{route('tipoproductos.create')}}" class="w-auto h-auto transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-gray-400 hover:bg-green--600 text-white font-semibold py-3 px-6 rounded-md md:w-60">
                    Añadir opcion
                </a>
            </div>
            <div class="bg-white flex flex-row justify-around p-3 md:rounded-b-md">
                <button class="w-auto h-auto transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md md:w-60">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
