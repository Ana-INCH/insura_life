<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'customer_id',
        'deceased_id',
        'start_date',
        'end_date',
        'total_amount',
        'state',
        'terms',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function deceased()
    {
        return $this->belongsTo(Deceased::class);
    }
    use HasFactory;
}
