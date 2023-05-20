<x-layout>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url(images/cervezasHome.jpg);">
                </div>
                <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
          <div class="heading-section">
            <span class="subheading">Trabajando Desde 2010</span>
            <h2 class="mb-4">Experiencia y Dedicacion</h2>

            <p>Tenemos variedad en Cervezas y licores</p>
           
            <p class="year">
                <strong class="number" data-number="13">0</strong>
                <span>Años de experiencia que nos respaldan</span>
            </p>
          </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 ">
                    <div class="sort w-100 text-center ftco-animate">
                        <div class="img" style="background-image: url(images/cerveza-1.jpg);"></div>
                        <h3>Cervezas</h3>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 ">
                    <div class="sort w-100 text-center ftco-animate">
                        <div class="img" style="background-image: url(images/tequila-1.jpg);"></div>
                        <h3>Tequila</h3>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 ">
                    <div class="sort w-100 text-center ftco-animate">
                        <div class="img" style="background-image: url(images/refrescos-1.jpg);"></div>
                        <h3>Refrescos</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
               
            </div>
        </div>

        <div class="row">

            @if (empty($productos[0]) || empty($productos[1]) || empty($productos[2]))


                    <div class="col-md-4" style="margin: auto">
                        <a href="/productos" class="btn btn-primary d-block">Ver Productos <span class="fa fa-long-arrow-right"></span></a>
                    </div>


            @else


                <div class="card" style="width: 18rem; background:bisque; margin:auto">

                    @if (empty($productos[0]->archivos->first()))
                        <img src="..." class="card-img-top" alt="...">
                    @else
                        <img src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($productos[0]->archivos->first()->nombre_hash)) }}" alt="">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $productos[0]->nombre }}</h5>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $productos[0]->contenido }}</li>
                        <li class="list-group-item">{{ $productos[0]->categoria->nombre_categoria }}</li>
                        <li class="list-group-item">${{ $productos[0]->precio }}</li>
                    </ul>

                    <div class="card-body">

                        <a href="productos/{{ $productos[0]->id }}">Ver Detalle</a> <br>

                    </div>
                </div>

                <div class="card" style="width: 18rem; background:bisque; margin:auto">

                    @if (empty($productos[1]->archivos->first()))
                        <img src="..." class="card-img-top" alt="...">
                    @else
                        <img src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($productos[1]->archivos->first()->nombre_hash)) }}" alt="">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $productos[1]->nombre }}</h5>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $productos[1]->contenido }}</li>
                        <li class="list-group-item">{{ $productos[1]->categoria->nombre_categoria }}</li>
                        <li class="list-group-item">${{ $productos[1]->precio }}</li>
                    </ul>

                    <div class="card-body">

                        <a href="productos/{{ $productos[1]->id }}">Ver Detalle</a> <br>

                    </div>
                </div>
        </div>
        <br> <br>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="/productos" class="btn btn-primary d-block">Ver Productos <span class="fa fa-long-arrow-right"></span></a>
            </div>
        </div>
        @endif
    </div>

<br> <br>

</x-layout>