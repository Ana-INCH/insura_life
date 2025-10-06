<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    // Nombre de la tabla en español
    protected $table = 'service';

    protected $fillable = [
        'insumo_id',
        'tipo',
        'descripcion',
        'precio',
        'duracion',
        'status'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'duracion' => 'integer',
    ];

    public function insumo()
    {
        return $this->belongsTo(Input::class, 'insumo_id');
    }

    public function difunto()
    {
        return $this->belongsTo(Deceased::class, 'difunto_id');
    }
}