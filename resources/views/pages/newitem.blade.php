@extends('layouts.main')

@section('content')
        <form method="POST" action="{{route('productos.store')}}" class="flex flex-col md:p-5 items-center">
        @csrf
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-plus-circle p-3 bg-white rounded-full border"></i> Nuevo item</p>
                    <button type="submit" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl p-2 rounded-full hover:from-green-600 hover:to-green-600 focus:outline-none  hover:bg-green-600 md:w-72">
                        Crear item
                    </button>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 px-6">
                    <p>Datos del item</p>
                </div>
                <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                    <div class="grid grid-col gap-3 md:grid-cols-2">
                        <input  name="nombre" type="text" placeholder="Nombre" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                        <input  name="marca" type="text" placeholder="Marca" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                    </div>
                    <div class="grid grid-col gap-3 md:grid-cols-2">
                        <input  name="codigo" type="text" placeholder="Codigo" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                        <input  name="descripcion" type="text" placeholder="Descripcion" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                    </div>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 px-6">
                    <p>Detalles del item</p>
                </div>
                <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                    <div class="grid grid-col gap-3 md:grid-cols-2">
                        <input  name="cantidad" type="text" placeholder="Cantidad inicial" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                        <select  name="unidad_id" type="text" placeholder="Unidad de medida" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                            <option value="" selected>-- Elegir Unidad de medida --</option>
                            @foreach ($unidades as $unidad)
                            <option value="{{$unidad->id}}" >{{$unidad->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                    <div class="grid grid-col gap-3 md:grid-cols-2">
                        <select name="tipo_producto_id" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                            <option value="" selected>-- Elegir tipo de item --</option>
                            @foreach ($tipoproductos as $tp)
                            <option value="{{$tp->id}}" >{{$tp->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Esto es para la opcion Insumos -->
                <div class="bg-white shadow-lg space-y-3 p-3 px-6">
                    <p>Datos del insumo</p>
                </div>
                <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                    <div class="grid grid-col gap-3 md:grid-cols-2">
                        <input  name="costo_unitario" type="text" placeholder="Costo neto insumo" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                    </div>
                </div>
                <!-- Fin opcion insumos -->
                <!-- Esto es para la opcion Productos -->
                <div class="bg-white shadow-lg space-y-3 p-3 px-6">
                    <p>Datos del Producto de venta</p>
                </div>
                <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                    <div class="grid grid-col gap-3 md:grid-cols-2">
                        <input  name="precio_unitario" type="text" placeholder="Valor venta" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                    </div>
                    <!-- Fin opcion productos -->
                </div>
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </form>
@endsection
