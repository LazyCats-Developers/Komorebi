
<form method="POST" action="{{route('empresas.store')}}">
@csrf
<input type="text" id="nombre" name="nombre" placeholder="Nombre" >
<input type="text" id="direccion" name="direccion" placeholder="Direccion" >
<input type="text" id="telefono" name="telefono" placeholder="Telefono" >
<input type="text" id="email" name="email" placeholder="Correo electronico" >
<input type="text" id="rut" name="rut" placeholder="RUT" >
<input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de empresa" >
<input type="text" id="empresa_rrss" name="empresa_rrss" placeholder="Redes sociales" >
<button>Registrar</button>

</form>