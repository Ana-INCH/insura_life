<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'sucursal_id', // ID de la sucursal
        'name',        // Nombre del empleado
        'position',    // Puesto del empleado
        'phone',       // Teléfono
        'email',       // Email
        'hiring_date', // Fecha de contratación
        'status',      // Estado del empleado
    ];

    // Si tienes una relación de tipo belongsTo con la tabla de Branch (Sucursal)
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'sucursal_id');
    }
}
