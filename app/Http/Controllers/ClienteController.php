<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return response()->json(Cliente::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|unique:clientes',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'cedula' => 'required|string|unique:clientes',
            'codigo_pais' => 'required|string',
            'telefono' => 'required|string',
            'servicio' => 'required|string',
            'plan' => 'required|string',
            'sector' => 'required|string',
            'estacion_base' => 'required|string',
            'tecnologia' => 'required|string',
            'estado' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'nullable|date',
        ]);

        $cliente = Cliente::create($validatedData);

        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'codigo' => 'required|string|unique:clientes,codigo,' . $id,
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'cedula' => 'required|string|unique:clientes,cedula,' . $id,
            'codigo_pais' => 'required|string',
            'telefono' => 'required|string',
            'servicio' => 'required|string',
            'plan' => 'required|string',
            'sector' => 'required|string',
            'estacion_base' => 'required|string',
            'tecnologia' => 'required|string',
            'estado' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'nullable|date',
        ]);

        $cliente->update($validatedData);

        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Cliente eliminado exitosamente']);
    }
}
