@component('mail::message')
Estimado Cliente

Le mandamos la coleccion de productos que tenemos disponible

@component('mail::table')
| Productos     |
| ------------- |
    @foreach ($productos as $producto)

 -{{ $producto->nombre }}

    @endforeach

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
