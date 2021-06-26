@extends('layouts.main')

@section('content')
<div class="grid grid-col space-y-5 p-5">

  <div class="grid grid-col md:grid-cols-2 space-y-5 md:space-y-0 md:space-x-5">

    <div class="grid grid-col md:grid-cols-2 bg-white rounded-xl p-5 md:space-x-5">
      <div>
        <img class= "w-full rounded-xl" src="../img/working.gif" alt="">
      </div>
      <div class="space-y-5">
      <p>
        Bienvenido, Gatito!
      </p> 
      <p>
        aqui estara toda la info personal
      </p>
      <a href="{{route('empresas.create')}}" class="btn btn-success mb-2">Agregar</a>
      </div>
      
    </div>

    <div class="grid grid-col space-y-5">

      <div class="bg-white rounded-xl p-5">
        Notificación
      </div>
      <div class="bg-white rounded-xl p-5">
        Notificación
      </div>
      <div class="bg-white rounded-xl p-5">
        Notificación
      </div>

    </div>

  </div>

  <div class="bg-white rounded-xl p-5">
    CRUD EMPRESAS
  </div>

</div>
@endsection