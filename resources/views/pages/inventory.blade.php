@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())

        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-clipboard-list p-3 bg-white rounded-full border"></i> INVENTARIO</p>
                    <a href="{{route('productos.create')}}" class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72">
                        Crear item
                    </a>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-64">
                        <button class="bg-blue-400 w-full text-white p-3 rounded-3xl md:rounded-r-full md:w-36 hover:bg-blue-500">
                            Buscar item
                        </button>
                    </div>
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-l-full md:w-24 hover:bg-blue-500">
                            Semana
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 md:w-24 hover:bg-blue-500">
                            Mes
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-r-full  md:w-24 hover:bg-blue-500">
                            Año
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                        <input type="text" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-64">
                        <button class="bg-blue-400 w-full text-white p-3 rounded-3xl md:rounded-r-full md:w-36 hover:bg-blue-500">
                            Buscar item
                        </button>
                    </div>
                    <div class="flex flex-row">
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-l-full md:w-24 hover:bg-blue-500">
                            Semana
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 md:w-24 hover:bg-blue-500">
                            Mes
                        </button>
                        <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-r-full  md:w-24 hover:bg-blue-500">
                            Detalles item
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-lg space-y-3 p-3 border-b">
                    <table class="w-full">
                        <thead>
                            <tr class="grid grid-cols-6 justify-items-center bg-gray-100 border rounded-t-3xl">
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Valor</th>
                                <th>Vendedor</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr class="grid grid-cols-6 justify-items-center bg-gray-100 border rounded-t-3xl">
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->codigo}}</td>
                                <td>{{$producto->marca}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->unidad}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route("productos.edit",[$producto])}}">
                                            <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route("productos.destroy", [$producto])}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </div>

    @endif
@endsection
