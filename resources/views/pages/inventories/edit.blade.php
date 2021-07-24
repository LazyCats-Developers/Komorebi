@extends('layouts.main')

@section('content')
    <form method="POST" action="{{route('productos.update', [$producto, $inventario])}}" class="flex flex-col md:p-5 items-center">
        @method("PUT")
        @csrf
        <div class="w-full max-w-7xl">
            <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                <p class="font-bold text-xl"><i class="fas fa-edit p-3 bg-white rounded-full border"></i> EDITAR ITEM</p>
                <button type="submit" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl p-2 rounded-full hover:from-green-600 hover:to-green-600 focus:outline-none  hover:bg-green-600 md:w-72">
                    Guardar cambios
                </button>
            </div>
            <div class="bg-white shadow-lg space-y-3 p-3 px-6">
                <p>Datos del item</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                <div class="grid grid-col gap-3 md:grid-cols-2">
                    <input value="{{$producto->nombre}}" name="producto[nombre]" type="text" placeholder="Nombre" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                    <input value="{{$producto->marca}}" name="producto[marca]" type="text" placeholder="Marca" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                </div>
                <div class="grid grid-col gap-3 md:grid-cols-2">
                    <input value="{{$producto->codigo}}" name="producto[codigo]" type="text" placeholder="Codigo" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                    <input value="{{$producto->descripcion}}" name="producto[descripcion]" type="text" placeholder="Descripcion" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                </div>
            </div>
            <div class="bg-white shadow-lg space-y-3 p-3 px-6">
                <p>Detalles del item</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                <div class="grid grid-col gap-3 md:grid-cols-2">
                    <input value="{{$inventario->cantidad}}" name="inventario[cantidad]" type="text" placeholder="Cantidad" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                    <select name="producto[unidad_id]" placeholder="Unidad de medida" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                        <option value="0" selected>-- Elegir Unidad de medida --</option>
                        @foreach ($unidades as $unidad)
                            <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                <div class="grid grid-col gap-3 md:grid-cols-2">
                    <select name="inventario[tipo_producto_id]" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                        <option value="" selected>-- Elegir tipo de item --</option>
                        @foreach ($tipoproductos as $tp)
                            <option value="{{$tp->id}}">{{$tp->nombre}}</option>
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
                    <input value="{{$inventario->costo_unitario}}" name="inventario[costo_unitario]" type="text" placeholder="Costo unitario" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                </div>
            </div>
            <!-- Fin opcion insumos -->
            <!-- Esto es para la opcion Productos -->
            <div class="bg-white shadow-lg space-y-3 p-3 px-6">
                <p>Datos del Producto de venta</p>
            </div>
            <div class="bg-white flex flex-col space-y-3 p-3 border-b">
                <div class="grid grid-col gap-3 md:grid-cols-2">
                    <input value="{{$inventario->precio_unitario}}" name="inventario[precio_unitario]" type="text" placeholder="Precio unitario" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full">
                </div>
                <!-- Fin opcion productos -->
            </div>
            <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                <p class="text-center text-gray-400">Komorebi</p>
            </div>
        </div>
    </form>
@endsection
