<form method="POST" action="{{route('productos.update')}}">
    @csrf
    <div class="form-group">
        <input  name="nombre" type="text" placeholder="Nombre">
        <input  name="codigo" type="text" placeholder="Codigo">
        <input  name="marca" type="text" placeholder="Marca">
        <input  name="cantidad" type="text" placeholder="Cantidad">
        <input  name="unidad" type="text" placeholder="Unidad">
        <input  name="precio_unitario" type="text" placeholder="Precio">
        <select name="tipo_producto_id">
            
            <option value="0" selected>Tipo</option>
            @foreach ($tipoproductos as $tp)
            <option value="{{$tp->id}}" >{{$tp->nombre}}</option>
            @endforeach
        </select>
        <input  name="descripcion" type="text" placeholder="Descripcion">
        
    </div>
    <button class="btn btn-success">Guardar</button>
</form>