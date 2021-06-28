<form method="POST" action="{{route('tipoproductos.store')}}">
    @csrf
    <div class="form-group">
        <input  name="nombre" type="text" placeholder="Nombre">
        <input  name="descripcion" type="text" placeholder="Descripcion">
    </div>
    <button class="btn btn-success">Guardar</button>
</form>