<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contract;  // Asegúrate de tener esta línea
use App\Models\Customer;
use App\Models\Deceased;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    
    public function index()
    {
        $contracts = Contract::all();
        $customers = Customer::all();  // Obtener clientes
        $deceaseds = Deceased::all();  // Obtener fallecidos
    
        return view('contract.index', compact('contracts', 'customers', 'deceaseds'));


    }
    public function get()
    {
        return response()->json(Contract::all());
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'deceased_id' => 'required|exists:deceaseds,id',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'total_amount' => 'nullable|string',
            'state' => 'nullable|string|max:50',
            'terms' => 'required|string|max:255',
            'status' => 'required|string|max:255',

        ]);

        $contract = Contract::create($validated);
        return response()->json($contract, 201);

    }

    public function show(Contract $contract)
    {
        
        return response()->json($contract);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'deceased_id' => 'required|exists:deceaseds,id',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'total_amount' => 'nullable|string',
            'state' => 'nullable|string|max:50',
            'terms' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $contract->update($validated);
        return response()->json($contract);
    }

    public function destroy(Contract $contract)
    {
        $contract->status = '0'; // Se cambia a 0 para reflejar el borrado lógico
        $contract->save();
        return response()->json($contract);
    }
}
