<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;  // Asegúrate de tener esta línea
use App\Models\FuneralHome;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        $funeralHomes = FuneralHome::all();

        return view('customer.index', compact('customers', 'funeralHomes'));
    }
    public function get()
    {
        return response()->json(Customer::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'funeral_home_id' => 'required|exists:funeral_homes,id',
            'name' => 'string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:customers,email',
            'address' => 'nullable|string|max:255',
            'rfc' => 'nullable|string|max:13',
            'registration_date' => 'nullable|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $customer = Customer::create($validated);
        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {

        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'funeral_home_id' => 'required|exists:funeral_homes,id',
            'name' => 'string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:customers,email,' . $customer->id,
            'address' => 'nullable|string|max:255',
            'rfc' => 'nullable|string|max:13',
            'registration_date' => 'nullable|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $customer->update($validated);
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->status = '0'; // Se cambia a 0 para reflejar el borrado lógico
        $customer->save();
        return response()->json($customer);
    }
}
