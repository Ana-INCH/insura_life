@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-hand-holding-heart"></i> Servicios</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createServiceModal">
                <i class="fas fa-plus"></i> Agregar Servicio
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($services->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover border-dark border border-1">
                            <thead>
                                <tr class="border-dark border border-1 bg-primary text-white">
                                    <th>ID</th>
                                    <th>Insumo</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Duración</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td class="border border-dark border-1">{{ $service->id }}</td>
                                        <td class="border border-dark border-1">{{ $service->insumo->nombre ?? 'N/A' }}</td>
                                        <td class="border border-dark border-1">{{ $service->tipo }}</td>
                                        <td class="border border-dark border-1">{{ $service->descripcion ?? 'N/A' }}</td>
                                        <td class="border border-dark border-1">${{ number_format($service->precio, 2) }}</td>
                                        <td class="border border-dark border-1">{{ $service->duracion ?? 'N/A' }} min</td>
                                        <td class="border border-dark border-1 text-center">
                                            @if($service->status == 1)
                                                <span class="badge bg-success" style="padding: 6px 10px; font-weight: 500;">
                                                    <i class="bi bi-check-circle"></i>
                                                </span>
                                            @else
                                                <span class="badge bg-danger" style="padding: 6px 10px; font-weight: 500;">
                                                    <i class="bi bi-x-circle"></i>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-service" data-bs-toggle="modal"
                                                data-bs-target="#editServiceModal" data-service="{{ $service->id }}">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-service"
                                                data-service="{{ $service->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No hay servicios registrados.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Servicio -->
    <div class="modal fade" id="createServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createServiceForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Insumo</label>
                                <select name="insumo_id" class="form-control" required>
                                    <option value="">Seleccione un insumo</option>
                                    @foreach ($inputs as $input)
                                        <option value="{{ $input->id }}">{{ $input->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <input type="text" class="form-control" name="tipo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Precio</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" name="precio" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Duración (minutos)</label>
                                <input type="number" class="form-control" name="duracion">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Estatus</label>
                                <select name="status" class="form-control">
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Servicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Servicio -->
    <div class="modal fade" id="editServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editServiceForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="service_id" id="edit_service_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Insumo</label>
                                <select name="insumo_id" class="form-control" required id="edit_insumo_id">
                                    <option value="">Seleccione un insumo</option>
                                    @foreach ($inputs as $input)
                                        <option value="{{ $input->id }}">{{ $input->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <input type="text" class="form-control" name="tipo" id="edit_tipo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="edit_descripcion" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Precio</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" name="precio" id="edit_precio" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Duración (minutos)</label>
                                <input type="number" class="form-control" name="duracion" id="edit_duracion">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Estatus</label>
                                <select name="status" class="form-control" id="edit_status">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
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

            // Crear Servicio
            const createServiceForm = document.getElementById('createServiceForm');
            createServiceForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(createServiceForm);
                const data = Object.fromEntries(formData.entries());
                
                // Asegurarse de que status se envía como número
                if (data.status) {
                    data.status = parseInt(data.status);
                }
                
                console.log('Datos a enviar:', data);

                fetch('/services', {
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
                        console.log('Respuesta del servidor:', result);
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Servicio creado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error('Error al crear servicio:', error);
                        let errorMessage = error.message || 'No se pudo crear el servicio';
                        if(error.errors) {
                            errorMessage += '<br>' + formatErrors(error.errors);
                        }
                        Swal.fire({
                            title: 'Error',
                            html: errorMessage,
                            icon: 'error'
                        });
                    });
            });

            // Cargar datos para editar Servicio
            const editServiceButtons = document.querySelectorAll('.edit-service');
            editServiceButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service');
                    console.log('Editando servicio ID:', serviceId);

                    fetch(`/services/${serviceId}/edit`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if (response.ok) return response.json();
                            throw new Error('Error al cargar los datos');
                        })
                        .then(data => {
                            console.log('Datos recibidos:', data);
                            document.getElementById('edit_service_id').value = data.id;
                            document.getElementById('edit_insumo_id').value = data.insumo_id || '';
                            document.getElementById('edit_tipo').value = data.tipo;
                            document.getElementById('edit_descripcion').value = data.descripcion || '';
                            document.getElementById('edit_precio').value = data.precio;
                            document.getElementById('edit_duracion').value = data.duracion || '';
                            document.getElementById('edit_status').value = data.status;
                        })
                        .catch(error => {
                            console.error('Error al cargar datos:', error);
                            Swal.fire('Error', 'No se pudieron cargar los datos del servicio', 'error');
                        });
                });
            });

            // Editar Servicio
            const editServiceForm = document.getElementById('editServiceForm');
            editServiceForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const serviceId = document.getElementById('edit_service_id').value;
                const formData = new FormData(editServiceForm);
                const formDataObj = {};
                formData.forEach((value, key) => {
                    formDataObj[key] = value;
                });
                
                // Asegurarse de que status se envía como número
                if (formDataObj.status) {
                    formDataObj.status = parseInt(formDataObj.status);
                }
                
                const body = JSON.stringify(formDataObj);
                console.log('Datos a enviar:', body);
                
                fetch(`/services/${serviceId}`, {
                        method: 'PUT',
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
                        console.log('Respuesta del servidor:', data);
                        const editModal = bootstrap.Modal.getInstance(document.getElementById('editServiceModal'));
                        if (editModal) {
                            editModal.hide();
                        }
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Servicio actualizado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error('Error al actualizar:', error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al actualizar el servicio',
                            icon: 'error'
                        });
                    });
            });

            // Eliminar Servicio (cambiar estatus a inactivo)
            const deleteServiceButtons = document.querySelectorAll('.delete-service');
            deleteServiceButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service');
                    console.log('Eliminando servicio ID:', serviceId);
                    
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
                        if (result.isConfirmed) {
                            fetch(`/services/${serviceId}`, {
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
                                    'El servicio ha sido desactivado.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(error => {
                                console.error('Error al desactivar:', error);
                                Swal.fire(
                                    'Error',
                                    'No se pudo desactivar el servicio.',
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