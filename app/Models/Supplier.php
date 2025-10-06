<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'funeral_home_id',
        'name',
        'contact',
        'phone',
        'email',
        'tax_id',
        'address',
        'status',
    ];

    public function funeral_home()
    {
        return $this->belongsTo(FuneralHome::class);
    }
    use HasFactory;
}
