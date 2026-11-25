<?php

namespace App\Http\Controllers;

class InicioController extends Controller
{
    public function index()
    {
        $nombreProyecto = 'Pintura Lab';

        $descripcion = 'Sistema para la administración de categorías y productos.';

        $modulos = [
            'Administración de categorías',
            'Gestión de productos',
            'Gestión de usuarios'
        ];

        return view('inicio', compact(
            'nombreProyecto',
            'descripcion',
            'modulos'
        ));
    }
}