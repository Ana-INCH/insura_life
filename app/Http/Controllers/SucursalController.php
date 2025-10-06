<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\FuneralHome;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Renderiza la vista de sucursales con la lista de funerarias.
     */
    public function index()
    {
        $sucursales = Branch::all();
        $funeralHomes = FuneralHome::all();

        return view('sucursal.index', compact('sucursales', 'funeralHomes'));
    }

    /**
     * Muestra una lista de sucursales.
     */
    public function get()
    {
        return response()->json(Branch::all());
    }

    /**
     * Muestra una sucursal específica.
     */
    public function show(Branch $sucursal)
    {
        
        return response()->json($sucursal);
    }

    /**
     * Crea una nueva sucursal.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'funeral_home_id' => 'required|exists:funeral_homes,id',
            'name' => 'string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'manager' => 'nullable|string|max:255',
            'date' => 'nullable|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $sucursal = Branch::create($validated);
        return response()->json($sucursal, 201);
    }

    /**
     * Actualiza una sucursal existente.
     */
    public function update(Request $request, Branch $sucursal)
    {
        $validated = $request->validate([
            'funeral_home_id' => 'required|exists:funeral_homes,id',
            'name' => 'string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'manager' => 'nullable|string|max:255',
            'date' => 'nullable|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $sucursal->update($validated);
        return response()->json($sucursal);
    }

    /**
     * Elimina una sucursal de manera lógica.
     */
    public function destroy(Branch $sucursal)
    {
        $sucursal->status = '0'; // Se cambia a 0 para reflejar el borrado lógico
        $sucursal->save();
        return response()->json($sucursal);
    }
}
