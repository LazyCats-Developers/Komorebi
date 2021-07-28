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
                <p class="font-bold text-xl"><i class="far fa-handshake p-3 bg-white rounded-full border"></i> PROVEEDORES</p>
                <a href="{{route('proveedores.create')}}" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72">
                    Crear proovedor
                </a>
            </div>
            <!-- tabla de datos -->
            <div class="bg-white shadow-lg p-3 border-b">
                <table class="w-full">
                    <thead>
                    <tr class="grid grid-cols-5 md:grid-cols-7 bg-gray-200 border rounded-t-md md:rounded-t-xl text-base 2xl:text-xl">
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th class="hidden md:block">RRSS</th>
                        <th class="hidden md:block">Descipcion</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="grid grid-cols-5 md:grid-cols-7 border rounded-b-md md:rounded-b-xl text-base 2xl:text-xl">
                            <!-- en esta linea va el foreach -->
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="hidden md:block text-center"></td>
                            <td class="hidden md:block text-center"></td>
                            <td class="flex justify-around">
                                <a class="btn btn-warning" href="{{route('proveedores.edit', $proveedores)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td class="text-center">
                            <!-- en esta linea va el endforeach -->
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                <p class="text-center text-gray-400">Komorebi</p>
            </div>
        </div>
    </div>

@endsection
