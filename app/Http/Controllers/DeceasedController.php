<?php

namespace App\Http\Controllers;

use App\Models\Deceased;
use Illuminate\Http\Request;

class DeceasedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deceased = Deceased::latest()->get();
        return view('deceased.index', compact('deceased'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deceased.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|string|max:50',
            'fecha_defuncion' => 'required|string|max:50',
            'causa_muerte' => 'nullable|string|max:255',
            'lugar_defuncion' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);

        // Si no se proporciona un estatus, establecerlo como activo por defecto
        if (!isset($validated['status'])) {
            $validated['status'] = 1;
        }

        $deceased = Deceased::create($validated);

        return response()->json(['success' => true, 'data' => $deceased]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deceased $deceased)
    {
        return response()->json($deceased);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deceased $deceased)
    {
        // Asegurarse de que las fechas estén en formato Y-m-d
        if ($deceased->fecha_nacimiento) {
            $deceased->fecha_nacimiento = date('Y-m-d', strtotime($deceased->fecha_nacimiento));
        }
        
        if ($deceased->fecha_defuncion) {
            $deceased->fecha_defuncion = date('Y-m-d', strtotime($deceased->fecha_defuncion));
        }
        
        return response()->json($deceased);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deceased $deceased)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|string|max:50',
            'fecha_defuncion' => 'required|string|max:50',
            'causa_muerte' => 'nullable|string|max:255',
            'lugar_defuncion' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);
    
        // Para depuración
        \Log::info('Datos recibidos para actualizar:', $validated);
        \Log::info('Status antes de actualizar: ' . $deceased->status);
        
        $deceased->update($validated);
        
        // Para depuración
        \Log::info('Status después de actualizar: ' . $deceased->status);
    
        return response()->json(['success' => true, 'data' => $deceased]);
    }

    /**
     * Remove the specified resource from storage.
     * Eliminación lógica: cambia el estatus a inactivo.
     */
    public function destroy(Deceased $deceased)
    {
        $deceased->status = 0;
        $deceased->save();
        return response()->json($deceased);
    }
}