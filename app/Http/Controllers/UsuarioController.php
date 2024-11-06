<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:usuarios',
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|unique:usuarios|regex:/^\d{3}-\d{6}-\d{4}[A-Z]$/',
            'codigo_pais' => 'required',
            'telefono' => 'required',
            'servicio' => 'required',
            'plan' => 'required',
            'sector' => 'required',
            'estacion_base' => 'required',
            'tecnologia' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'required|date',
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'codigo' => 'required|unique:usuarios,codigo,' . $usuario->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|unique:usuarios,cedula,' . $usuario->id . '|regex:/^\d{3}-\d{6}-\d{4}[A-Z]$/',
            'codigo_pais' => 'required',
            'telefono' => 'required',
            'servicio' => 'required',
            'plan' => 'required',
            'sector' => 'required',
            'estacion_base' => 'required',
            'tecnologia' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'required|date',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
