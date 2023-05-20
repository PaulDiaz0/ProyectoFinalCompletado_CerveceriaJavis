<x-layout>
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <br>
            @if (empty($producto->archivos->first()))
                <img src="..." class="card-img-top" alt="...">
            @else
                @foreach ($producto->archivos as $archivo)

                <form action="/archivo/{{ $archivo->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="producto_id" value= "{{ $producto->id }}" >
                    <img src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($archivo->nombre_hash)) }}" alt="">
                    <br> <br>
                    @can('delete',$producto)
                    <input type="submit" value="Eliminar" class="btn btn-primary d-block" style="color: white">
                    @endcan
                </form>


                <br> <br>
                @endforeach
            @endif
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <br> <br> <br> <br>
                <h3>{{ $producto->nombre }}</h3>
                <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star"></span></a>
                        </p>
                </div>
                <p>{{ $producto->contenido }}</p>
                <p class="price"><span>${{ $producto->precio }}</span></p>
                <p style="color: rgb(0, 61, 193)">{{ $producto->categoria->nombre_categoria }}</p> <br>
                <p>{{ $producto->descripcion }}</p>




            </div>
            <div class="w-100"></div>
                <div class="col-md-12">
                  <h2>Existencias:</h2>
                  @foreach ($producto->ubicacions as $data)
                    <div>
                    <form action="/stock/{{ $producto->id}}/{{ $data->id}}/edit" method="POST">
                        @csrf
                        @method('GET')
                        {{ $data->domicilio }} =>
                        {{ $data->pivot->existencias }}

                        @can('update',$producto)
                        <input type="submit" value="Actualizar" class="btn btn-primary d-block" style="color: rgb(24, 212, 17)">
                        @endcan
                    </form>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    @can('create',$producto)
        <div class="card text-center">
            <div class="card-header">
                Subir Imagen:
            </div>
            <div class="card-body">
                <form action="/archivo" method="POST" enctype="multipart/form-data">
                    @csrf
                 <input type="hidden" name="producto_id" value= "{{ $producto->id }}" >

                    <input type="file"  value="Agregar imagen"  style="color: rgb(238, 17, 17)" name="archivos[]"  multiple  required>

                      @error('archivos')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                     <div class="card-footer text-muted">
                        <input type="submit" value="Guardar" class="btn btn-primary" style="color: rgb(197, 15, 15)">
                      </div>

                </form> <br>
            </div>
          </div>
          @endcan
    <br>
</x-layout>