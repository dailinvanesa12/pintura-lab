@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <h2>{{ $nombreProyecto }}</h2>
    <p>{{ $descripcion }}</p>

    <h2>Módulos del proyecto</h2>
    <ul>
        @forelse ($modulos as $modulo)
            <li>{{ $modulo }}</li>
        @empty
            <li>No existen módulos disponibles.</li>
        @endforelse
    </ul>

    <p><a class="btn" href="{{ route('categorias.index') }}">Ir a Administración de categorías</a></p>
@endsection