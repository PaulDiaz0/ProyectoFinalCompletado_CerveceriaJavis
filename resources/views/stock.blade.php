<x-layout>
    <div style="text-align: center">
        <h1>Actualizar Stock</h1>
    
        @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                 </div>
        @endif
    
        <form action="/stock/{{ $producto->id }}/{{$ubicacion->id}}" method="POST">
            @method('GET')
    
            @csrf
            <label for="producto">Nombre del producto:</label> <br>
            <input type="text" name="producto" value="{{ $producto->nombre }}" disabled>
            <br>
    
            <label for="ubicacion">Ubicacion:</label> <br>
            <input type="text" name="ubicacion" value="{{ $ubicacion->domicilio }}" disabled>
            <br>
    
            <label for="ubicacion_id"></label>
            <input type="hidden" name="ubicacion_id" value="{{ $ubicacion->id }}">
    
             @foreach ($producto->ubicacions as $data)
              @php
                if ($data->id == $ubicacion->id) {
                    $existencias= $data->pivot->existencias;
                }
              @endphp
             @endforeach
    
            <label for="existencias">Existencias</label> <br>
            <input type="number" name="existencias" value="{{ $existencias }}" min="0" required>
            <br>
            <!-- Validacion -->
            @error('existencias')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
    
            <input type="submit" value="Guardar">
    
        </form>
        <br>
    </div>
    
    </x-layout>