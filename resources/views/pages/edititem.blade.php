
<form method="POST" action="{{route('productos.update',[$producto,$inventario])}}">
    @method("PUT")
    @csrf
    <div class="form-group">
        <input value="{{$producto->nombre}}"  name="producto[nombre]" type="text" placeholder="Nombre">
        <input value="{{$producto->codigo}}" name="producto[codigo]" type="text" placeholder="Codigo">
        <input value="{{$producto->marca}}" name="producto[marca]" type="text" placeholder="Marca">
        <input value="{{$inventario->cantidad}}" name="inventario[cantidad]" type="text" placeholder="Cantidad">
        <select name="producto[unidad_id]">

            <option value="0" >Unidad</option>
            @foreach ($unidades as $unidad)
            <option value="{{$unidad->id}}" {{ ( $unidad->id == $inventario->unidad_id) ? 'selected' : '' }}>{{$unidad->nombre}}</option>
            @endforeach
        </select>
        <input value="{{$inventario->precio_unitario}}" name="inventario[precio_unitario]" type="text" placeholder="Precio unitario">
        <input value="{{$inventario->costo_unitario}}" name="inventario[costo_unitario]" type="text" placeholder="Costo unitario">

        <select name="inventario[tipo_producto_id]">

            <option value="0" >Tipo</option>
            @foreach ($tipoproductos as $tp)
            <option value="{{$tp->id}}" {{ ( $tp->id == $inventario->tipo_producto_id) ? 'selected' : '' }}>{{$tp->nombre}}</option>
            @endforeach
        </select>
        <input value="{{$producto->descripcion}}" name="producto[descripcion]" type="text" placeholder="Descripcion">

    </div>
    <button class="btn btn-success">Guardar</button>
</form>
