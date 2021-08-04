@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-5 items-center">
        <div class="w-full max-w-7xl">
            <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                <p class="font-bold text-xl"><i class="fas fa-house-user p-3 bg-white rounded-full border"></i> CREAR EMPRESA</p>
            </div>
            <form method="POST" action="{{route('empresas.store')}}">
                @csrf
                <div class="bg-white shadow-lg grid-col space-y-3 p-3 pb-5 border-b">
                    <p>Datos de la empresa</p>
                    <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre de la empresa" class="border border-gray w-auto rounded-xl py-3 px-4" required>
                        <input type="text" id="rut" name="rut" placeholder="RUT de la empresa" class="border border-gray w-auto rounded-xl py-3 px-4">
                    </div>
                    <div class="grid grid-col space-y-3">
                        <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de la empresa" class="border border-gray w-full rounded-xl py-3 px-4">
                    </div>
                </div>
                <div class="bg-white shadow-lg grid-col space-y-3 p-3 pb-5">
                    <p>Contacto de la empresa</p>
                    <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                        <input type="text" id="direccion" name="direccion" placeholder="Direccion de la empresa" class="border border-gray w-auto rounded-xl py-3 px-4">
                        <input type="text" id="telefono" name="telefono" placeholder="Telefono de la empresa" class="border border-gray w-auto rounded-xl py-3 px-4">
                    </div>
                    <div class="grid grid-col space-y-3 md:grid-cols-2 md:space-y-0 md:space-x-3">
                        <input type="text" id="email" name="email" placeholder="Correo electronico de la empresa" class="border border-gray w-auto rounded-xl py-3 px-4">
                        <input type="text" id="empresa_rrss" name="empresa_rrss" placeholder="Redes sociales de la empresa" class="border border-gray w-auto rounded-xl py-3 px-4">
                    </div>
                </div>
                <div class="bg-white shadow-lg grid-col p-3">
                    <div class="flex flex-row justify-around space-x-3">
                        <button type="reset" class="w-full h-auto transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-gray-400 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-full md:w-60">
                            Descartar
                        </button>
                        <button class="w-full h-auto transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-full md:w-60">
                            Registrar
                        </button>
                    </div>
                </div>
            </form>
            <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl border-t">
                <p class="text-center text-gray-400">Komorebi</p>
            </div>
        </div>
    </div>
@endsection
