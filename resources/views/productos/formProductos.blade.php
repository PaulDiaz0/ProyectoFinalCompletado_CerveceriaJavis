<x-layout>

    <div style="text-align: center">
        <h1>Registra un producto</h1>
    
        <!-- Validacion  -->
        @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                 </div>
        @endif
    
        @isset($producto)
        <form action="/productos/{{ $producto->id }}" method="POST">  {{-- Editar --}}
            @method('PATCH')
    
            @else
            <form action="/productos" method="POST">  {{-- Crear --}}
        @endisset
    
            @csrf
            <label for="nombre">Nombre del producto:</label> <br>
            <input type="text" name="nombre" value="{{ isset($producto) ? $producto->nombre : old('nombre') }}" required> <br>
    
            <!-- Validacion -->
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <br>
    
            <label for="contenido">Contenido:</label> <br>
            <input type="text" name="contenido" value="{{ isset($producto) ? $producto->contenido : old('contenido') }}" required>
             <br>
    
            <!-- Validacion -->
            @error('contenido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <br>
            <label for="precio">Precio:</label> <br>
            <input type="number" name="precio" value="{{ isset($producto) ? $producto->precio : old('precio') }}" min="0" step="0.01" required>
             <br>
    
            <!-- Validacion -->
            @error('precio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <br>
    
            <label for="descripcion">Descripcion:</label> <br>
            <textarea name="descripcion" required>{{ isset($producto) ? $producto->descripcion : old('descripcion') }}</textarea>
             <br>
    
            <!-- Validacion -->
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <br>
    
            {{-- Datos de tabla relacionada --}}
            <label for="categoria_id">Categoria</label> <br>
            <select name="categoria_id" id="categoria_id">
    
                  @foreach ($categorias as $categoria)
    
         <option value="{{ $categoria->id }}" {{ isset($producto) && $producto->categoria_id ==  $categoria->id  ? ' selected' :'' }}>{{ $categoria->nombre_categoria }}</option>
    
                @endforeach
            </select>
            <br> <br>
    
            <input type="submit" value="Guardar">
    
        </form>
        <br>
    </div>
    </x-layout>