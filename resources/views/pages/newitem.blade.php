@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <form method="POST" action="{{route('productos.store')}}">
            @csrf
            <div class="bg-white grid-col p-3 border-b border-gray-300 md:rounded-t-md">
                <p>Datos del item</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 mb-3 md:rounded-b-md">
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                    <input  name="nombre" type="text" placeholder="Nombre" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                    <input  name="marca" type="text" placeholder="Marca" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                </div>
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                    <input  name="codigo" type="text" placeholder="Codigo" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                    <input  name="descripcion" type="text" placeholder="Descripcion" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
            </div>
            <div class="bg-white grid-col p-3 border-b border-gray-300 md:rounded-t-md">
                <p>Dosificación del item</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 mb-3 md:rounded-b-md">
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                    <input  name="cantidad" type="text" placeholder="Cantidad" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                    <select  name="unidad_id" type="text" placeholder="Unidad de medida" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                        <option value="" selected>-- Elegir Unidad de medida --</option>
                        @foreach ($unidades as $unidad)
                        <option value="{{$unidad->id}}" >{{$unidad->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="bg-white grid-col p-3 border-b border-gray-300 md:rounded-t-md">
                <p>Tipo del item</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 mb-3 md:rounded-b-md">
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                    <select name="tipo_producto_id" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                        <option value="" selected>-- Elegir tipo de item --</option>
                        @foreach ($tipoproductos as $tp)
                        <option value="{{$tp->id}}" >{{$tp->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Esto es para la opcion Insumos -->
            <div class="bg-white grid-col p-3 border-b border-gray-300 md:rounded-t-md">
                <p>Datos del insumo</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 mb-3 md:rounded-b-md">
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                    <input  name="costo_unitario" type="text" placeholder="Costo insumo" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                    <input  name="stock_inicial" type="text" placeholder="Stock inicial" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
                <div class="space-y-3 md:space-y-0 md:space-x-3">
                    <label for="iva">Este item contiene IVA incluido</label> <input type="checkbox" name="iva" id="iva">
                </div>
            </div>
            <!-- Fin opcion insumos -->
            <!-- Esto es para la opcion Productos -->
            <div class="bg-white grid-col p-3 border-b border-gray-300 md:rounded-t-md">
                <p>Datos del Producto de venta</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 mb-3 md:rounded-b-md">
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                    <input  name="precio_unitario" type="text" placeholder="Valor venta" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                    <input  name="stock_inicial" type="text" placeholder="Stock inicial" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
                <div class="space-y-3 md:space-y-0 md:space-x-3">
                    <label for="iva">Este item contiene IVA incluido</label> <input type="checkbox" name="iva" id="iva">
                </div>
                <!-- Fin opcion productos -->
            </div>
            <div class="bg-white flex flex-row justify-around p-3 md:rounded-md">
                <button class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-md">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
