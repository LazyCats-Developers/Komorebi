@extends('layouts.main')

@section('content')
<div class="flex flex-col md:space-y-5 md:p-5">

  <div class="flex flex-col md:flex-row md:space-x-5">
    <div class="flex w-auto h-auto bg-white md:rounded-md p-3 space-x-3">
      <div>
        <img class= "w-24 rounded-md" src="../img/working.gif" alt="">
      </div>
      <div class="md:w-80">
        <p>Bienvenido, {{ auth()->user()->nombre }} </p> 
        
        <p>
          @if(auth()->user()->empresas()->exists())         
            {{ auth()->user()->colaboradores()->first()->cargo_usuario }} de {{ auth()->user()->empresas()->first()->nombre }}
          @else
            Aún no tienes empresa registrada
          @endif
        </p>
        <p class="text-sm text-blue-500">Editar tu perfil</p>
      </div>
    </div>

    <div class="flex w-full bg-white md:rounded-md p-3">
      <div class="flex w-full justify-center items-center">
        <i class="fas fa-cash-register"></i><br>
        <p class="invisible md:visible"> Notificación!</p>
      </div>
      <div class="flex w-full justify-center items-center bg-red-100">
        <i class="fas fa-cash-register"></i>
        <p class="invisible md:visible"> Notificación!</p>
      </div>
      <div class="flex w-full justify-center items-center">
        <i class="fas fa-cash-register"></i><br>
        <p class="invisible md:visible"> Notificación!</p>
      </div>
    </div>
  </div>
</div>
@endsection