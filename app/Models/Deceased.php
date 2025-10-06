<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'fecha_defuncion',
        'causa_muerte',
        'lugar_defuncion',
        'status'
    ]; 
    use HasFactory;

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_defuncion' => 'date',
    ];

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}