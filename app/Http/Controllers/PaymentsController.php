<?php
// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Client;
use App\Models\Contract;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Show the list of payments
    public function index()
    {
        $payments = Payment::with(['client', 'contract'])->get(); // Get all payments with client and contract relationships
        return view('payments.index', compact('payments'));
    }

    // Show the create payment form
    public function create()
    {
        $clients = Client::all(); // Get all clients
        $contracts = Contract::all(); // Get all contracts
        return view('payments.create', compact('clients', 'contracts'));
    }

    // Store a new payment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'contract_id' => 'required|exists:contracts,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
            'receipt' => 'nullable|string|max:255',
            'payment_date' => 'required|date',
        ]);

        Payment::create($validated);
        return redirect()->route('payments.index')->with('success', 'Payment successfully recorded');
    }

    // Show the edit payment form
    public function edit(Payment $payment)
    {
        $clients = Client::all();
        $contracts = Contract::all();
        return view('payments.edit', compact('payment', 'clients', 'contracts'));
    }

    // Update a payment
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'contract_id' => 'required|exists:contracts,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
            'receipt' => 'nullable|string|max:255',
            'payment_date' => 'required|date',
        ]);

        $payment->update($validated);
        return redirect()->route('payments.index')->with('success', 'Payment successfully updated');
    }

    // Delete a payment
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment successfully deleted');
    }
}
