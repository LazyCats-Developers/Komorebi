@extends('layouts.main')

@section('content')

<form method="POST" action="{{route('productos.store')}}">
    @csrf
    <div class="form-group">
        <input  name="nombre" type="text" placeholder="Nombre">
        <input  name="marca" type="text" placeholder="Marca">
        <input  name="cantidad" type="text" placeholder="Cantidad">
        <input  name="unidad" type="text" placeholder="Unidad">
        <input  name="precio" type="text" placeholder="Precio">
        <select  name="tipo"  >
            <option value=0 selected>Tipo</option>
        </select>
        <input  name="descripcion" type="text" placeholder="Descripcion">
        <a class="btn btn-primary" href="{{route('tipoproductos.create')}}">Añadir opcion</a>
    </div>
    <button class="btn btn-success">Guardar</button>
</form>

@endsection