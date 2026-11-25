<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(Request $request): View
    {
        $buscar = trim((string) $request->query('buscar', ''));

        $categorias = Categoria::query()
            ->when($buscar !== '', fn ($q) => $q->where('nombre', 'like', "%{$buscar}%"))
            ->orderBy('nombre')
            ->get();

        return view('categorias.index', compact('categorias', 'buscar'));
    }

    public function create(): View
    {
        return view('categorias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $datos = $request->validate($this->reglas(), $this->mensajes());
        $datos['activa'] = $request->boolean('activa');

        Categoria::create($datos);

        return redirect()->route('categorias.index')
            ->with('exito', 'La categoría se creó correctamente.');
    }

    public function edit(Categoria $categoria): View
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        $datos = $request->validate($this->reglas($categoria), $this->mensajes());
        $datos['activa'] = $request->boolean('activa');

        $categoria->update($datos);

        return redirect()->route('categorias.index')
            ->with('exito', 'La categoría se actualizó correctamente.');
    }

    public function destroy(Categoria $categoria): RedirectResponse
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('exito', 'La categoría se eliminó correctamente.');
    }

    private function reglas(?Categoria $categoria = null): array
    {
        return [
            'nombre' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('categorias', 'nombre')->ignore($categoria?->id),
            ],
            'descripcion' => ['nullable', 'string', 'max:255'],
            'activa' => ['nullable', 'boolean'],
        ];
    }

    private function mensajes(): array
    {
        return [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
            'descripcion.max' => 'La descripción no puede superar los 255 caracteres.',
        ];
    }
}