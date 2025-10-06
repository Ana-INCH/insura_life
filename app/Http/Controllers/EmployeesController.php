<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeesController extends Controller
{
    /**
     * Renderiza la vista de empleados con la lista de empleados y sucursales.
     */
    public function index()
    {
        $employees = Employee::all();
        $sucursales = Branch::all();

        Log::debug('Empleados:', $employees->toArray());
        Log::debug('Sucursales:', $sucursales->toArray());

        return view('empleados.index', compact('employees', 'sucursales'));
    }

    /**
     * Muestra una lista de empleados.
     */
    public function get()
    {
        return response()->json(Employee::all());
    }

    /**
     * Muestra un empleado específico.
     */
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    /**
     * Crea un nuevo empleado.
     */
    public function store(Request $request)
    {
        // Log para ver los datos recibidos
        Log::debug('Datos recibidos para crear empleado:', $request->all());

        // Validación de los datos de entrada
        $validated = $request->validate([
            'sucursal_id' => 'required|exists:branches,id', // Verificar que el id de sucursal sea válido
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'hiring_date' => 'required|date',
            'status' => 'required|boolean', // Asegúrate de que 'status' sea booleano
        ]);

        // Log para ver los datos validados
        Log::debug('Datos validados para crear empleado:', $validated);

        try {
            // Crear el nuevo empleado con los datos validados
            $employee = Employee::create($validated);

            // Log para ver el empleado creado
            Log::debug('Empleado creado:', $employee->toArray());

            return response()->json($employee, 201);
        } catch (\Exception $e) {
            // Si hay un error al crear el empleado, lo logeamos
            Log::error('Error al crear empleado: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el empleado'], 500);
        }
    }

    /**
     * Actualiza un empleado existente.
     */
    public function update(Request $request, Employee $employee)
    {
        Log::debug('Datos recibidos para actualizar empleado:', $request->all());

        // Validación de los datos de entrada
        $validated = $request->validate([
            'sucursal_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'hiring_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        // Log para ver los datos validados
        Log::debug('Datos validados para actualizar empleado:', $validated);

        try {
            // Actualizar los datos del empleado
            $employee->update($validated);

            // Log para ver el empleado actualizado
            Log::debug('Empleado actualizado:', $employee->toArray());

            return response()->json($employee);
        } catch (\Exception $e) {
            Log::error('Error al actualizar empleado: ' . $e->getMessage());
            return response()->json(['error' => 'Error al actualizar el empleado'], 500);
        }
    }

    /**
     * Elimina un empleado de manera lógica.
     */
    public function destroy(Employee $employee)
    {
        Log::debug('Eliminando empleado:', $employee->toArray());

        try {
            // Cambiar el estado del empleado a '0' para reflejar el borrado lógico
            $employee->status = '0';
            $employee->save();

            return response()->json(['message' => 'Empleado eliminado correctamente', 'employee' => $employee]);
        } catch (\Exception $e) {
            Log::error('Error al eliminar empleado: ' . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el empleado'], 500);
        }
    }
}
