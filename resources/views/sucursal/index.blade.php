@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-building"></i> Sucursales</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBranchModal">
                <i class="fas fa-plus"></i> Agregar Sucursal
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($sucursales->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover border-dark border border-1">
                            <thead>
                                <tr class=" border-dark border border-1 bg-primary text-white">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Encargado</th>
                                    <th>Fecha</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sucursales as $sucursal)
                                    <tr>
                                        <td class="border border-dark border-1">{{ $sucursal->id }}</td>
                                        
                                        <td class="border border-dark border-1">{{ $sucursal->name }}</td>
                                        <td class="border border-dark border-1">{{ $sucursal->address }}</td>
                                        <td class="border border-dark border-1">{{ $sucursal->phone }}</td>
                                        <td class="border border-dark border-1">{{ $sucursal->manager }}</td>
                                        <td class="border border-dark border-1">{{ $sucursal->date }}</td>
                                        <td class="border border-dark border-1">
                                            @if ($sucursal->status == '1')
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-branch" data-bs-toggle="modal"
                                                data-bs-target="#editBranchModal" data-branch="{{ $sucursal->id }}">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-branch"
                                                data-branch="{{ $sucursal->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No hay sucursales registradas.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Sucursal -->
    <div class="modal fade" id="createBranchModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createBranchForm">
                    <input type="hidden" name="funeral_home_id" value="{{ $funeralHomeDetails['id'] }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Encargado</label>
                                <input type="text" class="form-control" name="manager">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="text" class="form-control" name="date">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Estatus</label>
                                <select name="status" class="form-control" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Sucursal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Editar Sucursal -->
    <div class="modal fade" id="editBranchModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editBranchForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="branch_id" id="edit_branch_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Funeral Home</label>
                            <select name="funeral_home_id" class="form-control" required id="edit_funeral_home_id">
                                <option value="">Selecciona una funeraria</option>
                                @foreach ($funeralHomes as $funeralHome)
                                    <option value="{{ $funeralHome->id }}">{{ $funeralHome->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" id="edit_name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="address" id="edit_address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Encargado</label>
                                <input type="text" class="form-control" name="manager" id="edit_manager">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="phone" id="edit_phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="text" class="form-control" name="date" id="edit_date">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Estatus</label>
                                <select name="status" class="form-control" required id="edit_status">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar Sucursal</button>
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

            // Crear Sucursal
            const createBranchForm = document.getElementById('createBranchForm');
            createBranchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(createBranchForm);
                const data = Object.fromEntries(formData.entries());

                fetch('/sucursal/store', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        Swal.fire('¡Éxito!', 'Sucursal creada correctamente', 'success')
                            .then(() => location.reload());
                    })
                    .catch(error => {
                        Swal.fire('Error', 'No se pudo crear la sucursal', 'error');
                    });
            });
            // Cargar datos para editar Sucursal.
            const editBranchButtons = document.querySelectorAll('.edit-branch');
            editBranchButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const branchId = this.getAttribute('data-branch');

                    fetch(`/sucursal/${branchId}/show`, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if (response.ok) return response.json();
                            throw new Error('Error al cargar los datos');
                        })
                        .then(data => {
                            document.getElementById('edit_branch_id').value = data.id;
                            document.getElementById('edit_funeral_home_id').value = data
                                .funeral_home_id;
                            document.getElementById('edit_name').value = data.name;
                            document.getElementById('edit_address').value = data.address;
                            document.getElementById('edit_phone').value = data.phone;
                            document.getElementById('edit_manager').value = data.manager;
                            document.getElementById('edit_date').value = data.date;
                            document.getElementById('edit_status').value = data.status;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            });

            // Edita una Sucursal
            // Actualizar Proveedor mediante POST con _method=PUT.
            const editBranchForm = document.getElementById('editBranchForm');
            editBranchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const branchId = document.getElementById('edit_branch_id').value;
                const formData = new FormData(editBranchForm);
                const formDataObj = {};
                formData.forEach((value, key) => {
                    formDataObj[key] = value;
                });
                const body = JSON.stringify(formDataObj);
                fetch(`/sucursal/${branchId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: body
                    })
                    .then(response => {
                        if (response.ok) return response.json();
                        throw new Error('Error en la actualización');
                    })
                    .then(data => {
                        const editModal = bootstrap.Modal.getInstance(document.getElementById(
                            'editBranchModal'));
                        if (editModal) {
                            editModal.hide();
                        }
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Sucursal actualizado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al actualizar el Sucursal',
                            icon: 'error'
                        });
                    });
            });

            // Eliminar Sucursal
            const deleteBranchButtons = document.querySelectorAll('.delete-branch');
            deleteBranchButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const branchId = this.getAttribute('data-branch');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Esta acción no se puede revertir",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/sucursal/${branchId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire('¡Eliminado!',
                                            'La sucursal ha sido eliminada.', 'success')
                                        .then(() => location.reload());
                                })
                                .catch(error => {
                                    Swal.fire('Error',
                                        'No se pudo eliminar la sucursal.', 'error');
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
