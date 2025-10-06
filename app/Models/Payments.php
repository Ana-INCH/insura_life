<?php
// app/Models/Payment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', // Client ID
        'contract_id', // Contract ID
        'amount',
        'payment_method',
        'reference',
        'status',
        'receipt',
        'payment_date',
    ];

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // Relationship with Contract
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
}
