
<form method="POST" action="{{route('productos.update',[$producto,$inventario])}}">
    @method("PUT")
    @csrf
    <div class="form-group">
        <input value="{{$producto->nombre}}"  name="nombre" type="text" placeholder="Nombre">
        <input value="{{$producto->codigo}}" name="codigo" type="text" placeholder="Codigo">
        <input value="{{$producto->marca}}" name="marca" type="text" placeholder="Marca">
        <input value="{{$inventario->cantidad}}" name="cantidad" type="text" placeholder="Cantidad">
        <input value="{{$producto->unidad}}" name="unidad" type="text" placeholder="Unidad">
        <input value="{{$inventario->precio_unitario}}" name="precio_unitario" type="text" placeholder="Precio">
        <select name="tipo_producto_id">

            <option value="0" >Tipo</option>
            @foreach ($tipoproductos as $tp)
            <option value="{{$tp->id}}" {{ ( $tp->id == $inventario->tipo_producto_id) ? 'selected' : '' }}>{{$tp->nombre}}</option>
            @endforeach
        </select>
        <input value="{{$producto->descripcion}}" name="descripcion" type="text" placeholder="Descripcion">

    </div>
    <button class="btn btn-success">Guardar</button>
</form>
