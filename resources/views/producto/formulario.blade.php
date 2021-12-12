FORMULARIO DE PRODUCTO
    <br>
    <label for="nombre"> Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ isset($producto->nombre)?$producto->nombre:'' }}">
    <br>
    <label for="descripcion"> Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" value="{{ isset($producto->descripcion)?$producto->descripcion:'' }}">
    <br>
    <label for="precio"> precio</label>
    <input type="float" name="precio" id="precio" value="{{ isset($producto->precio)?$producto->precio:'' }}">
    <br>
    <input type="submit" value="Guardar Datos">
    <br>
    <a href="{{ url('producto/') }}"> Regresar</a>


