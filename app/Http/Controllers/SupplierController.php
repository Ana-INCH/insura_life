<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Renderiza la vista de proveedores con la lista de proveedores.
     */

    public function index()
    {
        $suppliers = Supplier::all();

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Muestra una lista de proveedores.
     */
    public function get()
    {
        return response()->json(Supplier::all());
    }

    /**
     * Muestra un proveedor específico.
     */
    public function show(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    /**
     * Crea un nuevo proveedor.
     */
    public function store(Request $request)
    {
        // Array ficticio para funeral_home_id
        $validated = $request->validate([
            'funeral_home_id' => 'required|exists:funeral_homes,id',
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:suppliers,email',
            'tax_id' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);

        $supplier = Supplier::create($validated);
        return response()->json($supplier, 201);
    }

    /**
     * Actualiza un proveedor existente.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'funeral_home_id' => 'exists:funeral_homes,id',
            'name' => 'string|max:255',
            'contact' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:suppliers,email,' . $supplier->id,
            'tax_id' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);

        $supplier->update($validated);
        return response()->json($supplier);
    }

    /**
     * Elimina un proveedor de manera lógica.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->status = 0;
        $supplier->save();
        return response()->json($supplier);
    }
}
