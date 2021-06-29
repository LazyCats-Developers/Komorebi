@extends('layouts.main')

@section('content')
<div class="flex flex-col md:p-3">

        <div class="bg-white grid-col p-3 border-b border-gray-300 md:rounded-t-md">
                <p>INVENTARIO</p>
        </div>
        <div class="bg-white grid grid-col space-y-3 p-3 border-b border-gray-300 md:space-y-0 md:space-x-3 md:grid-cols-2">
                <a href="{{route('productos.create')}}" class="flex justify-center w-auto bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl">
                        Crear items
                </a>
                <a href="" class="flex justify-center w-auto bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl">
                        Editar items
                </a>
        </div>
        <div class="bg-white grid-col space-y-3 p-3 border-b border-gray-300">
                <p>Datos de la empresa</p>
                        <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                                <input type="text" id="nombre" name="nombre" placeholder="Nombre de la empresa" class="border border-gray-300 w-auto rounded-md py-3 px-4" required>
                                <input type="text" id="rut" name="rut" placeholder="RUT de la empresa" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                        </div>
                <div class="grid grid-col space-y-3">
                        <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de la empresa" class="border border-gray-300 w-full rounded-md py-3 px-4">            
                </div>
        </div>
        <div class="bg-white grid-col space-y-3 p-3 md:rounded-b-md">
                <p>Contacto de la empresa</p>
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                        <input type="text" id="direccion" name="direccion" placeholder="Direccion de la empresa" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                        <input type="text" id="telefono" name="telefono" placeholder="Telefono de la empresa" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
                <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                        <input type="text" id="email" name="email" placeholder="Correo electronico de la empresa" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                        <input type="text" id="empresa_rrss" name="empresa_rrss" placeholder="Redes sociales de la empresa" class="border border-gray-300 w-auto rounded-md py-3 px-4">
                </div>
        </div>
        <div class="bg-white p-5">
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
</div>
@endsection