@extends('layouts.app')

@section('titulo', 'Editar categoría')

@section('contenido')
    <h2>Editar categoría</h2>

    {{-- Formulario HTML con método POST (simula PUT con @method) --}}
    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
        @csrf
        @method('PUT')
        @include('categorias._form', ['textoBoton' => 'Actualizar categoría'])
    </form>
@endsection