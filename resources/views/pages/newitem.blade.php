@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <div class="bg-gray-400 grid-col p-3 md:rounded-t-md">
            <p class="text-white">CREAR ITEM</p>
        </div>
        <form method="POST" action="{{route('productos.store')}}">
            @csrf
            <div class="bg-white flex flex-col space-y-3 p-3 border-b border-gray-300">
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="nombre" type="text" placeholder="Nombre" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                    <input  name="marca" type="text" placeholder="Marca" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="unidad" type="text" placeholder="Unidad" class="border border-gray-300 w-auto rounded-md py-3 px-4">

                    <input  name="cantidad" type="text" placeholder="Cantidad" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="codigo" type="text" placeholder="Codigo" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                    <input  name="descripcion" type="text" placeholder="Descripcion" class="border border-gray w-auto rounded-md py-3 px-4">
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="precio_unitario" type="text" placeholder="Precio" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                    <select name="tipo_producto_id" class="border border-gray w-auto rounded-md py-3 px-4">
                        <option value="0" selected>Tipo</option>
                        @foreach ($tipoproductos as $tp)
                        <option value="{{$tp->id}}" >{{$tp->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-col justify-items-end space-y-3 md:space-y-0 md:space-x-3">
                    <a href="{{route('tipoproductos.create')}}" class="flex justify-center w-full bg-white-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-gray-100 md:max-w-xs">
                        Añadir tipo
                    </a>
                </div>
            </div>
            <div class="bg-white flex flex-row justify-around p-3 md:rounded-b-md">
                <button class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-md">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
