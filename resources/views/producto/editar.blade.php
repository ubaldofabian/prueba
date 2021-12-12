<h1>EDITAR PRODUCTO</h1>

<form action="{{ url('/producto/'.$producto->id) }}" method="post">
@csrf
    {{ method_field('PATCH') }}

    @include('producto.formulario');

</form>

