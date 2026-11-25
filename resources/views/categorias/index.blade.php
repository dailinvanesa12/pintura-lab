@extends('layouts.app')

@section('titulo', 'Categorías')

@section('contenido')
    <div class="barra">
        <h2>Administración de categorías</h2>
        <a class="btn" href="{{ route('categorias.create') }}">+ Nueva categoría</a>
    </div>

    {{-- Formulario HTML con método GET: búsqueda por nombre --}}
    <form method="GET" action="{{ route('categorias.index') }}">
        <label for="buscar">Buscar por nombre</label>
        <input type="text" id="buscar" name="buscar" value="{{ $buscar }}" placeholder="Ej: Esmaltes">
        <p>
            <button type="submit" class="btn">Buscar</button>
            @if ($buscar !== '')
                <a class="btn btn-gris" href="{{ route('categorias.index') }}">Limpiar</a>
            @endif
        </p>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion ?? '—' }}</td>
                    <td>{{ $categoria->activa ? 'Activa' : 'Inactiva' }}</td>
                    <td>
                        <a class="btn btn-gris" href="{{ route('categorias.edit', $categoria) }}">Editar</a>

                        {{-- Formulario POST (con @method('DELETE')) para eliminar --}}
                        <form class="inline" method="POST" action="{{ route('categorias.destroy', $categoria) }}"
                              onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-peligro">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay categorías registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection