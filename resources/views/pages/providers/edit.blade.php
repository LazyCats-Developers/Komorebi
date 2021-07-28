@extends('layouts.main')

@section('content')

    @if(session('status'))
        <div>
            {{ session('status')['message'] }}
        </div>
    @endif

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:p-5 items-center">
        <div class="w-full max-w-7xl">
            <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                <p class="font-bold text-xl"><i class="fas fa-user-edit p-3 bg-white rounded-full border"></i> CREACION DE PROVEEDOR</p>
                <a href="" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72 invisible">
                    Actualizar datos
                </a>
            </div>
            <div class="bg-white flex flex-col md:flex-row">
                <div class="w-96 p-3 py-5">
                    <form enctype="multipart/form-data" action="" method="POST">
                    @csrf
                        <div class="flex flex-col space-y-3 items-center">
                            <img class="w-60 rounded-full" src="{{ auth()->user()->avatar_url }}">
                            <input class="bg-gray-100 w-60" type="file" name="avatar">
                            <input class="w-full bg-blue-400 text-white py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500" type="submit">
                        </div>
                    </form>
                </div>
                <div class="w-full">
                    <form action="" method="POST">
                    @csrf
                        <div class="flex-col p-3">
                            <p>Datos personales</p>
                        </div>
                        <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-5 p-3">
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre proveedor" class="border border-gray w-full rounded-md py-3 px-4">
                            <input type="text" id="rut" name="rut" placeholder="Rut proveedor" class="border border-gray w-full rounded-md py-3 px-4">
                        </div>
                        <div class="flex-col px-3 pt-3">
                            <p>Datos de Contactos</p>
                        </div>
                        <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-5 p-3">
                            <input type="text" id="email" name="email" placeholder="E-Mail proveedor" class="border border-gray w-full rounded-md py-3 px-4">
                            <input type="text" id="telefono" name="telefono" placeholder="Telefono proveedor" class="border border-gray w-full rounded-md py-3 px-4">
                        </div>
                        <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-5 p-3">
                            <input type="text" id="direccion" name="direccion" placeholder="Direccion proveedor" class="border border-gray w-full rounded-md py-3 px-4">
                            <input type="text" id="empresa_rrss" name="empresa_rrss" placeholder="RRSS proveedor" class="border border-gray w-full rounded-md py-3 px-4">
                        </div>
                        <div class="flex flex-col space-y-3 p-3">
                            <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion proveedor" class="border border-gray w-full rounded-md py-3 px-4">
                        </div>
                        <div class="flex flex-col space-y-3 p-3 items-center">
                            <button type="submit" class="w-full bg-blue-400 text-white py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500">
                                Actualizar datos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
            </div>
            <div class="bg-white shadow-lg space-y-3 p-3 border-b">


            </div>
            <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                <p class="text-center text-gray-400">Komorebi</p>
            </div>
        </div>
    </div>

@endsection