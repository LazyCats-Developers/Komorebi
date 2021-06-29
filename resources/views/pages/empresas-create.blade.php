@extends('layouts.main')

@section('content')
<div class="flex flex-col md:p-3">

    <div class="bg-gray-400 grid-col p-3 md:rounded-t-md">
        <p class="text-white">CREAR EMPRESA</p>
    </div>
    <form method="POST" action="{{route('empresas.store')}}">
    @csrf    
        <div class="bg-white grid-col space-y-3 p-3 pb-5 border-b">
            <p>Datos de la empresa</p>
            <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre de la empresa" class="border border-gray w-auto rounded-md py-3 px-4" required>
                <input type="text" id="rut" name="rut" placeholder="RUT de la empresa" class="border border-gray w-auto rounded-md py-3 px-4">
            </div>
            <div class="grid grid-col space-y-3">
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de la empresa" class="border border-gray w-full rounded-md py-3 px-4">            
            </div>
        </div>
        <div class="bg-white grid-col space-y-3 p-3 pb-5 border-b">
            <p>Contacto de la empresa</p>
            <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                <input type="text" id="direccion" name="direccion" placeholder="Direccion de la empresa" class="border border-gray w-auto rounded-md py-3 px-4">
                <input type="text" id="telefono" name="telefono" placeholder="Telefono de la empresa" class="border border-gray w-auto rounded-md py-3 px-4">
            </div>
            <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                <input type="text" id="email" name="email" placeholder="Correo electronico de la empresa" class="border border-gray w-auto rounded-md py-3 px-4">
                <input type="text" id="empresa_rrss" name="empresa_rrss" placeholder="Redes sociales de la empresa" class="border border-gray w-auto rounded-md py-3 px-4">
            </div>
        </div>
        <div class="bg-white grid-col p-3 md:rounded-b-md">
            <div class="flex flex-row justify-around space-x-3">
                <button type="reset" class="w-auto h-auto transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-gray-400 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-md md:w-60">
                    Descartar
                </button>
                <button class="w-auto h-auto transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md md:w-60">
                    Registrar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection