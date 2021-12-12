<h1>CREAR PRODUCTO</h1>

<form action="{{ url('/producto') }}" method="post">
    @csrf
    @include('producto.formulario');


</form>
