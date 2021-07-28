@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-5 items-center">
            <div class="w-full max-w-7xl">
                <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:justify-between bg-gray-50 shadow-lg grid-col p-2 border-b md:rounded-t-3xl">
                    <p class="font-bold text-xl"><i class="fas fa-cash-register p-3 bg-white rounded-full border"></i> OPCION NO IMPLEMENTADA</p>
                </div>
                <div class="bg-white shadow-lg flex flex-col space-y-3 p-3 items-center">
                    <div>
                        <p class="text-xl text-center">Esta vista corresponde a una opcion que no esta en la etapa actual de desarrollo.</p>
                        <p class="text-xl text-center"> para más informacion contacta con los desarrolladores de LazyCat Developmen Software.</p>
                    </div>

                        <img class= "w-60 h-60 rounded-full md:w-96 md:h-96" src="../img/working.gif" alt="">
                </div>
                <div class="bg-gray-50 shadow-lg p-2 md:rounded-b-3xl">
                    <p class="text-center text-gray-400">Komorebi</p>
                </div>
            </div>
        </div>
    @endif
@endsection
