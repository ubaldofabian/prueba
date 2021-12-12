Mostrar lista de productos

@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif

<a href="{{ url('producto/create') }}"> Registrar nuevo producto</a>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>nombre</th>
        <th>descripcion</th>
        <th>precio</th>
        <th>acciones</th>
    </tr>

    </thead>

    <tbody>
    @foreach( $productos as $producto )
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->precio }}</td>
        <td>
            <a href="{{ url('/producto/'.$producto->id.'/edit') }}">
                Editar
            </a>

            <form action="{{ url('/producto/'.$producto->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Quieres Borrar?')"
                       value="Borrar">
            </form>
            </td>
    </tr>
    @endforeach

    </tbody>
</table>
