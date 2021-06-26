@extends('layouts.main')

@section('content')
<div class="flex flex-col space-y-5 p-5">
    <div class="bg-white grid-col p-5 rounded-md">
        Creacion de empresa
    </div>

    <div class="bg-white grid-col p-5 rounded-md">
        <p>Datos de la empresa</p>
        <form class="space-y-5" method="POST" action="{{route('empresas.store')}}">
        @csrf
            <div class="grid grid-col space-y-5 md:grid-cols-2 md:space-y-0 md:space-x-5">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="border border-gray w-auto rounded-md py-3 px-4">
                <input type="text" id="rut" name="rut" placeholder="RUT" class="border border-gray w-auto rounded-md py-3 px-4">
            </div>
            <div class="grid grid-col space-y-5">
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de empresa" class="border border-gray w-full rounded-md py-3 px-4">            
            </div>
            <p>Contacto de la empresa</p>
            <div class="grid grid-col space-y-5 md:grid-cols-2 md:space-y-0 md:space-x-5">
                <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="border border-gray w-auto rounded-md py-3 px-4">
                <input type="text" id="telefono" name="telefono" placeholder="Telefono" class="border border-gray w-auto rounded-md py-3 px-4">
            </div>
            <div class="grid grid-col space-y-5 md:grid-cols-2 md:space-y-0 md:space-x-5">
                <input type="text" id="email" name="email" placeholder="Correo electronico" class="border border-gray w-auto rounded-md py-3 px-4">
                <input type="text" id="empresa_rrss" name="empresa_rrss" placeholder="Redes sociales" class="border border-gray w-auto rounded-md py-3 px-4">
            </div>
            <div class="grid grid-col space-y-5">
            <button class="w-full transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md md:max-w-sm">
                Registrar Empresa
            </button>
            </div>

        </form>
    </div>

</div>
@endsection