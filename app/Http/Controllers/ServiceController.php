<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Input;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('insumo')->get();
        $inputs = Input::where('status', 1)->get();
        
        return view('services.index', compact('services', 'inputs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inputs = Input::where('status', 1)->get();
        return view('services.create', compact('inputs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'insumo_id' => 'required|exists:inputs,id',
            'tipo' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'duracion' => 'nullable|integer|min:0',
            'status' => 'nullable|integer',
        ]);

        // Si no se proporciona un estatus, establecerlo como activo por defecto
        if (!isset($validated['status'])) {
            $validated['status'] = 1;
        }

        $service = Service::create($validated);

        // Devolver respuesta JSON en lugar de redireccionar
        return response()->json(['success' => true, 'data' => $service]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return response()->json($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'insumo_id' => 'required|exists:inputs,id',
            'tipo' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'duracion' => 'nullable|integer|min:0',
            'status' => 'nullable|integer',
        ]);

        // Actualizar explícitamente cada campo para asegurar que se actualice el estatus
        $service->insumo_id = $validated['insumo_id'];
        $service->tipo = $validated['tipo'];
        $service->descripcion = $validated['descripcion'] ?? null;
        $service->precio = $validated['precio'];
        $service->duracion = $validated['duracion'] ?? null;
        
        // Actualizar explícitamente el status si está presente
        if (isset($validated['status'])) {
            $service->status = (int)$validated['status'];
        }
        
        $service->save();

        return response()->json(['success' => true, 'data' => $service]);
    }

    /**
     * Remove the specified resource from storage.
     * Eliminación lógica: cambia el estatus a inactivo.
     */
    public function destroy(Service $service)
    {
        $service->status = 0;
        $service->save();
        return response()->json($service);
    }
}