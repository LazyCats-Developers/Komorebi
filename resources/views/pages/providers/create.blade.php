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
            </div>
            <div class="bg-white flex flex-col md:flex-row">
                <div class="w-full md:w-96 p-3 py-5 hidden md:block">
                    <div class="flex flex-col gap-3 items-center">
                        <img class="w-60 h-60 border rounded-xl" src="/img/provider.png">
                    </div>
                </div>
                <div class="w-full">
                    <form action="{{ route('proveedores.store')}}" method="POST">
                    @csrf
                        <div class="flex-col p-3">
                            <p>Datos personales</p>
                        </div>
                        <div class="flex flex-col gap-3 p-3 lg:flex-row">
                            <input type="text" name="proveedor[nombre]" placeholder="Nombre proveedor" class="border border-gray w-full rounded-xl py-3 px-4">
                            <input type="text" name="proveedor[rut]" placeholder="Rut proveedor" class="border border-gray w-full rounded-xl py-3 px-4">
                        </div>
                        <div class="flex-col p-3">
                            <p>Datos de Contactos</p>
                        </div>
                        <div class="flex flex-col gap-3 p-3 lg:flex-row">
                            <input type="text" name="proveedor[email]" placeholder="E-Mail proveedor" class="border border-gray w-full rounded-xl py-3 px-4">
                            <input type="text" name="proveedor[telefono]" placeholder="Telefono proveedor" class="border border-gray w-full rounded-xl py-3 px-4">
                        </div>
                        <div class="flex flex-col gap-3 p-3 lg:flex-row">
                            <input type="text" name="proveedor[direccion]" placeholder="Direccion proveedor" class="border border-gray w-full rounded-xl py-3 px-4">
                            <input type="text" name="proveedor[proveedor_rrss]" placeholder="RRSS proveedor" class="border border-gray w-full rounded-xl py-3 px-4">
                        </div>
                        <div class="flex flex-col p-3">
                            <input type="text" name="proveedor[descripcion]" placeholder="Descripcion proveedor" class="border border-gray w-full rounded-xl py-3 px-4">
                        </div>
                        <select name="transaccion[producto_id]" placeholder="producto" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-full" required>
                            <option value="" selected>-- Elegir producto --</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                            @endforeach
                        </select>
                        <div class="flex flex-col p-3 items-center">
                            <button type="submit" class="w-full bg-blue-400 text-white py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500">
                                Actualizar datos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 shadow-lg p-2 border-t md:rounded-b-3xl">
                <p class="text-center text-gray-400">Komorebi</p>
            </div>
        </div>
    </div>

@endsection
