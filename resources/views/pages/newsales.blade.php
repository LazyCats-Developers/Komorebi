@extends('layouts.main')

@section('content')

<div class="flex flex-col md:p-5 items-center">
    <div class="w-full max-w-7xl">
        <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
            <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                <p class="font-bold text-xl"><i class="fas fa-cart-plus p-3 bg-white rounded-full border"></i> CREAR VENTA</p>
            </div>
            <div class="flex flex-row gap-3">
                <button class="flex justify-center w-full bg-gradient-to-r from-green-300 to-green-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72">
                    Ingresar venta
                </button>
                <a href="{{route('ventas.kill')}}" class="flex justify-center w-full bg-gradient-to-r from-red-300 to-red-500 text-white text-xl hover:from-green-600 hover:to-green-600 focus:outline-none  p-2 rounded-full hover:bg-green-600 md:w-72">
                    Cancelar
                </a>
            </div>
        </div>

        <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
            {{-- Formulario de el buscador de items  --}}
            <form method='get' action="{{route('ventas.search')}}">

                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                    <input autofocus required type="text" name='codigo' placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-64">
                    <button type="submit" class="bg-blue-400 w-full text-white p-3 rounded-3xl md:rounded-r-full md:w-36 hover:bg-blue-500">
                        Buscar item
                    </button>
                </div>
            </form>
            {{-- Fin Formulario de el buscador de items y futura adicion al carro --}}
            <div class="flex flex-row gap-2">
                <p class="w-24 placeholder-gray-400 px-6 py-3 border border-gray-300 text-center md:rounded-l-full">Total</p>
                <input type="text" value="{{\Session::get('totalventa')}}" placeholder="Total venta" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 text-right md:rounded-r-full md:w-40" disabled>
            </div>
        </div>
        {{-- Formulario que muestra el resultado de buscar item --}}
        <form method='post' action="{{route('ventas.add')}}">
            @csrf
            <div class="bg-white shadow-lg flex flex-col space-y-3 pt-3 px-3 md:space-y-0 md:flex-row md:justify-between">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0">
                    @if(Session::has('buscaPro'))
                    <input class="hidden" name="id" value="{{Session::get('buscaPro')->id}}">
                    <input type="text" name="nombre" value="{{Session::get('buscaPro')->nombre}}" placeholder="Nombre item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-40" disabled>
                    <input type="text" name="codigo" value="{{Session::get('buscaPro')->codigo}}" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:w-40" disabled>
                    <input min="1" required type="number" name="cantidad" value="1" min="1" placeholder="Ingresar Cantidad" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-r-full md:w-44">
                    @else

                    <input type="text" name="nombre" placeholder="Nombre item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-l-full md:w-40" disabled>
                    <input type="text" name="codigo" placeholder="Codigo item" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:w-40" disabled>
                    <input required type="number" name="cantidad" min="1" placeholder="Ingresar Cantidad" class="w-full placeholder-gray-400 px-6 py-3 border border-gray-300 md:rounded-r-full md:w-44">
                    @endif


                </div>
                <div class="flex flex-row">
                    <button class="w-full bg-blue-400 text-white py-3 px-6 rounded-full  md:w-52 hover:bg-blue-500">
                        Agregar item
                    </button>
                </div>
        </form>
        {{-- Fin Formulario que muestra el resultado de buscar item --}}
    </div>
    <div class="bg-white shadow-lg space-y-3 p-3 border-b">
        <table class="w-full">
            <thead>
                <tr class="grid grid-cols-6 justify-items-center bg-gray-100 border rounded-t-3xl">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>valor</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr class="grid grid-cols-6 justify-items-center border rounded-b-3xl">
                    @if(Session::has('carroventa'))

                    @foreach (\Session::get('carroventa') as $producto)
                    <td class="text-center">{{$producto->codigo}}</td>
                    <td class="text-center">{{$producto->nombre}}</td>
                    <td class="text-center">{{$producto->valor}}</td>
                    <td class="text-center">{{$producto->cantidad}}</td>
                    <td class="text-center">{{$producto->valor * $producto->cantidad}}</td>


                    <td>
                        <form action="{{route('ventas.del')}}" method="post">
                            @csrf
                            <input class="hidden" name="codigo" value="{{$producto->codigo}}">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </td class="text-center">
                    @endforeach
                    @endif
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