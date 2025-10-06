<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funeraria extends Model
{
    protected $rules = [
        'telefono' => 'required|regex:/^[0-9]{10}$/',
        'email' => 'required|unique:funerarias,email',
        'rfc' => 'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/'
    ];
    use HasFactory;
}
