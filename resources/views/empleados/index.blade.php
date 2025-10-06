@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-users"></i> Empleados</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEmployeeModal">
                <i class="fas fa-plus"></i> Agregar Empleado
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($employees->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover border-dark border border-1">
                            <thead>
                                <tr class="border-dark border border-1 bg-primary text-white">
                                    <th>ID</th>
                                    <th>Sucursal</th>
                                    <th>Nombre</th>
                                    <th>Posición</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Fecha de contratación</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="border border-dark border-1">{{ $employee->id }}</td>
                                        <td class="border border-dark border-1">{{ $employee->branch->name ?? 'N/A' }}</td>
                                        <td class="border border-dark border-1">{{ $employee->name }}</td>
                                        <td class="border border-dark border-1">{{ $employee->position }}</td>
                                        <td class="border border-dark border-1">{{ $employee->phone }}</td>
                                        <td class="border border-dark border-1">{{ $employee->email }}</td>
                                        <td class="border border-dark border-1">{{ $employee->hiring_date }}</td>
                                        <td class="border border-dark border-1">
                                            @if ($employee->status == '1')
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-employee" data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeModal" data-employee="{{ $employee->id }}">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-employee"
                                                data-employee="{{ $employee->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No hay empleados registrados.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Empleado -->
    <div class="modal fade" id="createEmployeeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createEmployeeForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Sucursal</label>
                            <select name="sucursal_id" class="form-control" required> <!-- Cambié 'branch_id' por 'sucursal_id' -->
                                <option value="">Selecciona una sucursal</option>
                                @foreach ($sucursales as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Posición</label>
                            <input type="text" class="form-control" name="position">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" name="phone">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha de contratación</label>
                            <input type="date" class="form-control" name="hiring_date">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estatus</label>
                            <select name="status" class="form-control" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Empleado</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal Editar Empleado -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editEmployeeForm">
                <div class="modal-body">
                    <input type="hidden" id="edit_employee_id" name="employee_id"> <!-- Campo oculto para el ID del empleado -->

                    <div class="mb-3">
                        <label class="form-label">Sucursal</label>
                        <select id="edit_sucursal_id" name="sucursal_id" class="form-control" required>
                            <option value="">Selecciona una sucursal</option>
                            @foreach ($sucursales as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Posición</label>
                        <input type="text" class="form-control" id="edit_position" name="position">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="edit_phone" name="phone">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha de contratación</label>
                        <input type="date" class="form-control" id="edit_hiring_date" name="hiring_date">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estatus</label>
                        <select id="edit_status" name="status" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Crear Empleado
        document.getElementById('createEmployeeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            // Log para ver los datos enviados
            console.log('Datos enviados:', data);

            fetch('/empleados/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(() => {
                Swal.fire('¡Éxito!', 'Empleado creado correctamente', 'success')
                    .then(() => location.reload());
            })
            .catch(() => {
                Swal.fire('Error', 'No se pudo crear el empleado', 'error');
            });
        });

        // Cargar datos para editar empleado
document.querySelectorAll('.edit-employee').forEach(button => {
    button.addEventListener('click', function() {
        const employeeId = this.getAttribute('data-employee'); // Obtener el ID del empleado a editar

        fetch(`/empleados/${employeeId}/show`, {
            headers: { 'X-CSRF-TOKEN': csrfToken }
        })
        .then(response => response.json())
        .then(data => {
            // Llenar los campos del modal con los datos del empleado
            document.getElementById('edit_employee_id').value = data.id;
            document.getElementById('edit_sucursal_id').value = data.sucursal_id;  // Aquí también se cambió a 'sucursal_id'
            document.getElementById('edit_name').value = data.name;
            document.getElementById('edit_position').value = data.position;
            document.getElementById('edit_phone').value = data.phone;
            document.getElementById('edit_email').value = data.email;
            document.getElementById('edit_hiring_date').value = data.hiring_date;
            document.getElementById('edit_status').value = data.status;
        })
        .catch(() => console.error('Error al cargar datos para editar'));
    });
});
 // Cargar datos para editar empleado
 document.querySelectorAll('.edit-employee').forEach(button => {
            button.addEventListener('click', function() {
                const employeeId = this.getAttribute('data-employee');

                fetch(`/empleados/${employeeId}/show`, {
                    headers: { 'X-CSRF-TOKEN': csrfToken }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_employee_id').value = data.id;
                    document.getElementById('edit_sucursal_id').value = data.sucursal_id;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_position').value = data.position;
                    document.getElementById('edit_phone').value = data.phone;
                    document.getElementById('edit_email').value = data.email;
                    document.getElementById('edit_hiring_date').value = data.hiring_date;
                    document.getElementById('edit_status').value = data.status;
                })
                .catch(() => console.error('Error al cargar datos para editar'));
            });
        });

        // Guardar cambios de empleado
        document.getElementById('editEmployeeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());
            const employeeId = document.getElementById('edit_employee_id').value;

            fetch(`/empleados/${employeeId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(() => {
                Swal.fire('¡Éxito!', 'Empleado modificado correctamente', 'success')
                    .then(() => location.reload());
            })
            .catch(() => {
                Swal.fire('Error', 'No se pudo modificar el empleado', 'error');
            });
        });
        // Eliminar empleado
        document.querySelectorAll('.delete-employee').forEach(button => {
            button.addEventListener('click', function() {
                const employeeId = this.getAttribute('data-employee');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede revertir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/empleados/${employeeId}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': csrfToken }
                        })
                        .then(() => {
                            Swal.fire('¡Eliminado!', 'El empleado ha sido eliminado.', 'success')
                                .then(() => location.reload());
                        })
                        .catch(() => {
                            Swal.fire('Error', 'No se pudo eliminar el empleado.', 'error');
                        });
                    }
                });
            });
        });
    });
</script>
@endpush
