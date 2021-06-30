@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:p-3">
        <div class="bg-gray-400 grid-col p-3 md:rounded-t-md">
            <p class="text-white">UPS!</p>
        </div>
        <div class="bg-white flex flex-col space-y-3 p-3 rounded-b-md border-b border-gray-300">
            <p>Estamos trabajando para usted :D</p>
            <img class= "w-96 rounded-md" src="../img/working.gif" alt="">
        </div>
    </div>
@endsection
