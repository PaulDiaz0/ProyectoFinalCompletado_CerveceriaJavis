<h1>Responsiva de productos</h1>

<ul>
    @foreach ($productos as $producto)
        <li>{{ $producto->nombre }}</li>
    @endforeach

</ul>
