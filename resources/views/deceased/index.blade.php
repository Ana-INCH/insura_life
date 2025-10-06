@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-monument"></i> Difuntos</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDeceasedModal" onclick="document.getElementById('createDeceasedForm').reset();">
                <i class="fas fa-plus"></i> Agregar Difunto
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($deceased->count())
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover shadow-sm" style="border-radius: 10px; overflow: hidden; border-collapse: separate;">
                        <thead>
                            <tr class="bg-primary text-white" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">ID</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Nombre</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Fecha Nacimiento</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Fecha Defunción</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Causa Muerte</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Lugar Defunción</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Estatus</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deceased as $person)
                                <tr class="align-middle" style="transition: all 0.2s ease-in-out;" onmouseover="this.style.backgroundColor='#f8f9fc';" onmouseout="this.style.backgroundColor=''">
                                    <td class="text-center fw-bold" style="padding: 12px;">{{ $person->id }}</td>
                                    <td style="padding: 12px;">{{ $person->nombre }}</td>
                                    <td style="padding: 12px;">{{ $person->fecha_nacimiento ?? 'N/A' }}</td>
                                    <td style="padding: 12px;">
                                        <span class="badge bg-secondary rounded-pill" style="padding: 6px 10px; font-size: 0.85em;">
                                            {{ $person->fecha_defuncion }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px;">{{ $person->causa_muerte ?? 'N/A' }}</td>
                                    <td style="padding: 12px;">
                                        <span title="{{ $person->lugar_defuncion }}" style="cursor: pointer; display: block; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $person->lugar_defuncion ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px; text-align: center;">
                                        @if($person->status == 1)
                                            <span class="badge bg-success" style="padding: 6px 10px; font-weight: 500;">
                                                <i class="bi bi-check-circle"></i>
                                            </span>
                                        @else
                                            <span class="badge bg-danger" style="padding: 6px 10px; font-weight: 500;">
                                                <i class="bi bi-x-circle"></i>
                                            </span>
                                        @endif
                                    </td>
                                    <td style="padding: 12px; text-align: center;">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm edit-deceased" style="background-color: #36b9cc; color: white; margin-right: 5px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.2s ease-in-out;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editDeceasedModal"
                                                    data-deceased="{{ $person->id }}"
                                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.15)';"
                                                    onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm delete-deceased" style="background-color: #e74a3b; color: white; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.2s ease-in-out;"
                                                    data-deceased="{{ $person->id }}"
                                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.15)';"
                                                    onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>No hay difuntos registrados.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Difunto -->
    <div class="modal fade" id="createDeceasedModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> Registrar Difunto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createDeceasedForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" class="form-control" name="fecha_nacimiento">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Defunción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" class="form-control" name="fecha_defuncion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Causa de Muerte</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-clipboard"></i></span>
                                    <input type="text" class="form-control" name="causa_muerte">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Lugar de Defunción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                    <input type="text" class="form-control" name="lugar_defuncion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Estatus</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-check-circle"></i></span>
                                    <select name="status" class="form-control">
                                        <option value="1" selected>Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Difunto -->
    <div class="modal fade" id="editDeceasedModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Difunto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editDeceasedForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="deceased_id" id="edit_deceased_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="nombre" id="edit_nombre" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" class="form-control" name="fecha_nacimiento" id="edit_fecha_nacimiento">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Defunción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" class="form-control" name="fecha_defuncion" id="edit_fecha_defuncion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Causa de Muerte</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-clipboard"></i></span>
                                    <input type="text" class="form-control" name="causa_muerte" id="edit_causa_muerte">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Lugar de Defunción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                    <input type="text" class="form-control" name="lugar_defuncion" id="edit_lugar_defuncion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Estatus</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-check-circle"></i></span>
                                    <select name="status" class="form-control" id="edit_status">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('editDeceasedForm').reset();">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')
                ? document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                : '';

            // Función para formatear errores
            function formatErrors(errorObj) {
                let messages = [];
                for (const key in errorObj) {
                    if (errorObj.hasOwnProperty(key)) {
                        messages.push(errorObj[key].join(', '));
                    }
                }
                return messages.join('<br>');
            }

            // Crear Difunto
            const createDeceasedForm = document.getElementById('createDeceasedForm');
            createDeceasedForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(createDeceasedForm);
                const data = Object.fromEntries(formData.entries());

                fetch('/deceased', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        return response.json().then(result => {
                            if (!response.ok) {
                                throw result;
                            }
                            return result;
                        });
                    })
                    .then(result => {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Difunto registrado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        let errorMessage = error.message || 'No se pudo registrar el difunto';
                        if(error.errors) {
                            errorMessage += '<br>' + formatErrors(error.errors);
                        }
                        Swal.fire({
                            title: 'Error',
                            html: errorMessage,
                            icon: 'error'
                        });
                        console.error('Error al crear difunto:', error);
                    });
            });

            // Cargar datos para editar Difunto
            const editDeceasedButtons = document.querySelectorAll('.edit-deceased');
            editDeceasedButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const deceasedId = this.getAttribute('data-deceased');
                    console.log('Editando difunto ID:', deceasedId);

                    fetch(`/deceased/${deceasedId}/edit`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if(response.ok) return response.json();
                            throw new Error('Error al cargar los datos');
                        })
                        .then(data => {
                            console.log('Datos recibidos:', data);
                            document.getElementById('edit_deceased_id').value = data.id;
                            document.getElementById('edit_nombre').value = data.nombre;
                            
                            // Formatear fechas para campos date (YYYY-MM-DD)
                            // if (data.fecha_nacimiento) {
                                document.getElementById('edit_fecha_nacimiento').value = data.fecha_nacimiento;
                            //     console.log('Fecha nacimiento:', data.fecha_nacimiento);
                            // }
                            
                            // if (data.fecha_defuncion) {
                                document.getElementById('edit_fecha_defuncion').value = data.fecha_defuncion;
                            //     console.log('Fecha defunción:', data.fecha_defuncion);
                            // }
                            
                            document.getElementById('edit_causa_muerte').value = data.causa_muerte || '';
                            document.getElementById('edit_lugar_defuncion').value = data.lugar_defuncion || '';
                            document.getElementById('edit_status').value = data.status;
                        })
                        .catch(error => {
                            console.error('Error al cargar datos:', error);
                            Swal.fire('Error', 'No se pudieron cargar los datos del difunto', 'error');
                        });
                });
            });

            // Editar Difunto
            const editDeceasedForm = document.getElementById('editDeceasedForm');
            editDeceasedForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const deceasedId = document.getElementById('edit_deceased_id').value;
                const formData = new FormData(editDeceasedForm);
                const formDataObj = {};
                formData.forEach((value, key) => {
                    formDataObj[key] = value;
                });
                const body = JSON.stringify(formDataObj);
                console.log('Datos a enviar:', body);
                
                fetch(`/deceased/${deceasedId}`, {
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
                        const editModal = bootstrap.Modal.getInstance(document.getElementById('editDeceasedModal'));
                        if(editModal) {
                            editModal.hide();
                        }
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Difunto actualizado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error('Error al actualizar:', error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al actualizar el difunto',
                            icon: 'error'
                        });
                    });
            });

            // Eliminar Difunto (cambiar estatus a inactivo)
            const deleteDeceasedButtons = document.querySelectorAll('.delete-deceased');
            deleteDeceasedButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const deceasedId = this.getAttribute('data-deceased');
                    console.log('Eliminando difunto ID:', deceasedId);
                    
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Esta acción cambiará el estatus a inactivo",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, desactivar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if(result.isConfirmed) {
                            fetch(`/deceased/${deceasedId}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            })
                            .then(response => {
                                if(response.ok) return response.json();
                                throw new Error('Error al desactivar');
                            })
                            .then(data => {
                                console.log('Respuesta de desactivación:', data);
                                Swal.fire(
                                    '¡Desactivado!',
                                    'El difunto ha sido desactivado.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(error => {
                                console.error('Error al desactivar:', error);
                                Swal.fire(
                                    'Error',
                                    'No se pudo desactivar el difunto.',
                                    'error'
                                );
                            });
                        }
                    });
                });
            });
        });
    </script>
@endpush