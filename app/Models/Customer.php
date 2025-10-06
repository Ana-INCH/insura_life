<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'funeral_home_id',
        'name',
        'phone',
        'email',
        'address',
        'rfc',
        'registration_date',
        'status',
    ];

    public function funeral_home()
    {
        return $this->belongsTo(FuneralHome::class);
    }
    use HasFactory;
}
