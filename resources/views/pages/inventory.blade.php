@extends('layouts.main')

@section('content')
<div class="flex flex-col space-y-5 p-5">
        <a href="" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl">
                Crear items
        </a>
        <p>crear el form en views/pages/newitem.blade.php</p>
        <a href="" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-xl">
                Editar items
        </a>
        <p>crear el form en views/pages/edititem.blade.php</p>
</div>
@endsection