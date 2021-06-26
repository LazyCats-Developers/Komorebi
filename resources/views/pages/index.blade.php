@extends('layouts.main')

@section('content')
<div class="flex flex-col space-y-5 p-5">

  <div class="flex flex-col md:flex-row md:space-x-5">

    <div class="flex w-auto h-auto bg-white rounded-md p-3 space-x-3">
      <div>
        <img class= "w-24 rounded-md" src="../img/working.gif" alt="">
      </div>
      <div class="md:w-80">
        <p>Bienvenido, "USUARIO"</p> 
        <p>Jefe de "Empresa"</p>
        <p class="text-sm text-blue-500">Editar tu perfil</p>
      </div>
    </div>

    <div class="flex w-full bg-white rounded-md p-3">
      <div class="flex w-full justify-center items-center">
        <i class="fas fa-cash-register"></i><br>
        <p class="invisible md:visible">Notificación!</p>
      </div>
      <div class="flex w-full justify-center items-center bg-red-100">
        <i class="fas fa-cash-register"></i>
        <p class="invisible md:visible">Notificación!</p>
      </div>
      <div class="flex w-full justify-center items-center">
        <i class="fas fa-cash-register"></i><br>
        <p class="invisible md:visible">Notificación!</p>
      </div>
    </div>

  </div>

  <div class="bg-white grid-col space-y-5 p-5 rounded-md">
    <div class="flex justify-center ">
      <p>No tienes ninguna empresa registrada aun.</p>
    </div>
    <div class="flex justify-center">
      <a href="{{route('empresas.create')}}" class="flex justify-center w-full transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md md:max-w-xl">
        Crear empresa
      </a>
    </div>
  </div>
</div>
@endsection