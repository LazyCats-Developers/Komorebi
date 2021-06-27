@extends('layouts.main')

@section('content')
<div class="flex flex-col p-5">
    <div class="bg-gray-400 grid-col p-5 rounded-t-md">
        <p class="text-white">CREAR EMPRESA</p>
    </div>

    <div class="bg-white grid-col p-5 rounded-b-md">
        <p>Datos de la empresa</p>
        <form class="space-y-5" method="POST" action="{{route('empresas.store')}}">
        @csrf
            <div class="grid grid-col space-y-5 md:grid-cols-2 md:space-y-0 md:space-x-5">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre de la empresa" class="border border-gray w-auto rounded-md py-3 px-4" required>
                <input type="text" id="rut" name="rut" placeholder="RUT de la empresa" class="border border-gray w-auto rounded-md py-3 px-4" required>
            </div>
            <div class="grid grid-col space-y-5">
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de la empresa" class="border border-gray w-full rounded-md py-3 px-4" required>            
            </div>
            <p>Contacto de la empresa</p>
            <div class="grid grid-col space-y-5 md:grid-cols-2 md:space-y-0 md:space-x-5">
                <input type="text" id="direccion" name="direccion" placeholder="Direccion de la empresa" class="border border-gray w-auto rounded-md py-3 px-4" required>
                <input type="text" id="telefono" name="telefono" placeholder="Telefono de la empresa" class="border border-gray w-auto rounded-md py-3 px-4" required>
            </div>
            <div class="grid grid-col space-y-5 md:grid-cols-2 md:space-y-0 md:space-x-5">
                <input type="text" id="email" name="email" placeholder="Correo electronico de la empresa" class="border border-gray w-auto rounded-md py-3 px-4" required>
                <input type="text" id="empresa_rrss" name="empresa_rrss" placeholder="Redes sociales de la empresa" class="border border-gray w-auto rounded-md py-3 px-4" required>
            </div>
            <div class="flex grid-col justify-around space-y-5 md:flex-row md:space-y-0 md:space-x-5">
                <button type="reset" class="w-full transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-gray-400 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-md md:max-w-sm">
                    Descartar cambios
                </button>

                <button class="w-full transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md md:max-w-sm">
                    Registrar Empresa
                </button>
            </div>

        </form>
    </div>

</div>
@endsection