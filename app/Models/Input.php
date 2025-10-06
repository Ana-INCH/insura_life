<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;
    
    // Nombre de la tabla en español
    protected $table = 'inputs';

    protected $fillable = [
        'funeral_home_id',
        'nombre',
        'descripcion',
        'precio_unitario',
        'stock',
        'categoria',
        'codigo',
        'status',
    ];

    public function funeralhome()
    {
        return $this->belongsTo(FuneralHome::class);
    }
}