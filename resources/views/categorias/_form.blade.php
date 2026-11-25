{{-- Campos compartidos por los formularios de crear y editar --}}
@if ($errors->any())
    <div class="errores" role="alert">
        <strong>Revisa los siguientes errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="nombre">Nombre *</label>
<input type="text" id="nombre" name="nombre" maxlength="100"
       value="{{ old('nombre', $categoria->nombre ?? '') }}">
@error('nombre') <span class="error-campo">{{ $message }}</span> @enderror

<label for="descripcion">Descripción</label>
<textarea id="descripcion" name="descripcion" rows="3" maxlength="255">{{ old('descripcion', $categoria->descripcion ?? '') }}</textarea>
@error('descripcion') <span class="error-campo">{{ $message }}</span> @enderror

<label>
    <input type="checkbox" name="activa" value="1"
           {{ old('activa', $categoria->activa ?? true) ? 'checked' : '' }}>
    Categoría activa
</label>

<p>
    <button type="submit" class="btn">{{ $textoBoton }}</button>
    <a class="btn btn-gris" href="{{ route('categorias.index') }}">Cancelar</a>
</p>