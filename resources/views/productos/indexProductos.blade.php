<x-layout>
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">


    <div class="container">

        <a href="/enviar-reporte">Enviar Correo con Responsiva de Productos</a>

        <div class="row">

        @foreach ($productos as $producto )
        <div class="card" style="width: 18rem; background:rgb(32, 222, 255); margin:auto">

            @if (empty($producto->archivos->first()))
            <img src="..." class="card-img-top" alt="...">
            @else
            <img src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($producto->archivos->first()->nombre_hash)) }}" alt="">
            @endif


            <div class="card-body">
              <h5 class="card-title">{{ $producto->nombre }}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $producto->contenido }}</li>
              <li class="list-group-item">{{ $producto->categoria->nombre_categoria }}</li>
              <li class="list-group-item">${{ $producto->precio }}</li>
            </ul>
            <div class="card-body">

                <a href="productos/{{ $producto->id }}">Ver Detalle</a> <br>

                @can('update',$producto)
                <a href="productos/{{ $producto->id }}/edit">Editar</a>
                @endcan

                @can('delete',$producto)
                <form action="productos/{{ $producto->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Borrar" class="btn btn-primary d-block" style="color: rgb(243, 20, 20)">
                </form>
                @endcan

            </div>
          </div>

          @endforeach

        </div>
    </div>

    <br> <br>

    <br>
    <div style="text-align: center">
        @can('create', App\Models\Producto::class)
        <button><a href="/productos/create">Registrar nuevo producto</a> <br> </button>
        @endcan

    </div>
    <br>

</x-layout>