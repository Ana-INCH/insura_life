<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\Funeraria;
use Illuminate\Http\Request;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inputs = Input::with('funeraria')->get();
        $funerarias = Funeraria::all();
        
        return view('inputs.index', compact('inputs', 'funerarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funerarias = Funeraria::all();
        return view('inputs.create', compact('funerarias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'funeraria_id' => 'nullable|exists:funerarias,id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'precio_unitario' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string|max:100',
            'codigo' => 'required|string|max:100|unique:inputs,codigo',
            'status' => 'nullable|integer',
        ]);

        // Si no se proporciona un estatus, establecerlo como activo por defecto
        if (!isset($validated['status'])) {
            $validated['status'] = 1;
        }

        $input = Input::create($validated);

        // Devolver respuesta JSON en lugar de redireccionar
        return response()->json(['success' => true, 'data' => $input]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Input $input)
    {
        return response()->json($input);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Input $input)
    {
        return response()->json($input);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Input $input)
    {
        $validated = $request->validate([
            'funeraria_id' => 'nullable|exists:funerarias,id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'precio_unitario' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string|max:100',
            'codigo' => 'required|string|max:100|unique:inputs,codigo,'.$input->id,
            'status' => 'nullable|integer',
        ]);

        // Actualizar explícitamente cada campo para asegurar que se actualice el estatus
        $input->funeraria_id = $validated['funeraria_id'] ?? null;
        $input->nombre = $validated['nombre'];
        $input->descripcion = $validated['descripcion'];
        $input->precio_unitario = $validated['precio_unitario'];
        $input->stock = $validated['stock'];
        $input->categoria = $validated['categoria'];
        $input->codigo = $validated['codigo'];
        
        // Actualizar explícitamente el status si está presente
        if (isset($validated['status'])) {
            $input->status = (int)$validated['status'];
        }
        
        $input->save();

        return response()->json(['success' => true, 'data' => $input]);
    }

    /**
     * Remove the specified resource from storage.
     * Eliminación lógica: cambia el estatus a inactivo.
     */
    public function destroy(Input $input)
    {
        $input->status = 0;
        $input->save();
        return response()->json($input);
    }
}