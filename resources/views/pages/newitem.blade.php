@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <div class="bg-gray-400 grid-col p-3 md:rounded-t-md">
            <p class="text-white">CREAR ITEM</p>
        </div>
        <form method="POST" action="{{route('productos.store')}}">
            @csrf
            <div class="bg-white flex flex-col space-y-3 p-3 border-b border-gray-300">
                <div>
                    Datos del item
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="nombre" type="text" placeholder="Nombre" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                    <input  name="marca" type="text" placeholder="Marca" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="codigo" type="text" placeholder="Codigo" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                    <input  name="descripcion" type="text" placeholder="Descripcion" class="border border-gray w-auto rounded-md py-3 px-4">
                </div>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 border-b border-gray-300">
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    Dosificación del item
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="cantidad" type="text" placeholder="Cantidad" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                    <select  name="unidad" type="text" placeholder="Unidad de medida" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                        <option value="1">Unidad</option>
                        <option value="2">Kilogramo</option>
                        <option value="3">Gramos</option>
                        <option value="4">Litros</option>
                        <option value="5">Mililitros</option>
                        <option value="6">Onsas</option>
                    </select>
                </div>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 border-b border-gray-300">
                <div>
                    Tipo del item
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <select name="tipo_producto_id" class="border border-gray w-auto rounded-md py-3 px-4">
                        @foreach ($tipoproductos as $tp)
                        <option value="{{$tp->id}}" >{{$tp->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-col md:grid-cols-2 space-y-3 md:space-y-0 md:space-x-3">
                    <input  name="precio_unitario" type="text" placeholder="Costo/Valor Venta" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                    <input  name="stock_inicial" type="text" placeholder="Stock inicial" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
                <div class="space-y-3 md:space-y-0 md:space-x-3">
                    <label for="iva">Este item contiene IVA incluido</label> <input type="checkbox" name="iva" id="iva">
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
