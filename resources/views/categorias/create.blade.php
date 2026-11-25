@extends('layouts.app')

@section('titulo', 'Nueva categoría')

@section('contenido')
    <h2>Nueva categoría</h2>

    {{-- Formulario HTML con método POST --}}
    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf
        @include('categorias._form', ['textoBoton' => 'Guardar categoría'])
    </form>
@endsection
