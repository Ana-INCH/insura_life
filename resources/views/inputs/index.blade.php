@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-boxes"></i> Insumos</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInputModal" onclick="document.getElementById('createInputForm').reset();">
                <i class="fas fa-plus"></i> Agregar Insumo
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($inputs->count())
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover shadow-sm" style="border-radius: 10px; overflow: hidden; border-collapse: separate;">
                        <thead>
                            <tr class="bg-primary text-white" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">ID</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Funeraria</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Nombre</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Descripción</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Precio Unitario</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Stock</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Categoría</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Código</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Estatus</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inputs as $input)
                                <tr class="align-middle" style="transition: all 0.2s ease-in-out;" onmouseover="this.style.backgroundColor='#f8f9fc';" onmouseout="this.style.backgroundColor=''">
                                    <td class="text-center fw-bold" style="padding: 12px;">{{ $input->id }}</td>
                                    <td style="padding: 12px;">{{ $input->funeraria->nombre ?? 'N/A' }}</td>
                                    <td style="padding: 12px;">{{ $input->nombre }}</td>
                                    <td style="padding: 12px;">
                                        <span title="{{ $input->descripcion }}" style="cursor: pointer; display: block; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $input->descripcion }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px;">${{ number_format($input->precio_unitario, 2) }}</td>
                                    <td style="padding: 12px;">{{ $input->stock }}</td>
                                    <td style="padding: 12px;">{{ $input->categoria }}</td>
                                    <td style="padding: 12px;">{{ $input->codigo }}</td>
                                    <td style="padding: 12px; text-align: center;">
                                        @if($input->status == 1)
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
                                            <button class="btn btn-sm edit-input" style="background-color: #36b9cc; color: white; margin-right: 5px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.2s ease-in-out;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editInputModal"
                                                    data-input="{{ $input->id }}"
                                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.15)';"
                                                    onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm delete-input" style="background-color: #e74a3b; color: white; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.2s ease-in-out;"
                                                    data-input="{{ $input->id }}"
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
                    <p>No hay insumos registrados.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Insumo -->
    <div class="modal fade" id="createInputModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> Crear Insumo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createInputForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Funeraria</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                                    <select name="funeraria_id" class="form-control">
                                        <option value="">Selecciona una funeraria</option>
                                        @foreach ($funerarias as $funeraria)
                                            <option value="{{ $funeraria->id }}">{{ $funeraria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                    <input type="text" class="form-control" name="descripcion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Precio Unitario</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" name="precio_unitario" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-box"></i></span>
                                    <input type="number" class="form-control" name="stock" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Categoría</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-bookmark"></i></span>
                                    <input type="text" class="form-control" name="categoria" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Código</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-upc"></i></span>
                                    <input type="text" class="form-control" name="codigo" required>
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

    <!-- Modal Editar Insumo -->
    <div class="modal fade" id="editInputModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Insumo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editInputForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="input_id" id="edit_input_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Funeraria</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                                    <select name="funeraria_id" class="form-control" id="edit_funeraria_id">
                                        <option value="">Selecciona una funeraria</option>
                                        @foreach ($funerarias as $funeraria)
                                            <option value="{{ $funeraria->id }}">{{ $funeraria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                    <input type="text" class="form-control" name="nombre" id="edit_nombre" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                    <input type="text" class="form-control" name="descripcion" id="edit_descripcion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Precio Unitario</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" name="precio_unitario" id="edit_precio_unitario" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-box"></i></span>
                                    <input type="number" class="form-control" name="stock" id="edit_stock" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Categoría</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-bookmark"></i></span>
                                    <input type="text" class="form-control" name="categoria" id="edit_categoria" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Código</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-upc"></i></span>
                                    <input type="text" class="form-control" name="codigo" id="edit_codigo" required>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('editInputForm').reset();">
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

            // Crear Insumo
            const createInputForm = document.getElementById('createInputForm');
            createInputForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(createInputForm);
                const data = Object.fromEntries(formData.entries());
                
                // Asegurarse de que status se envía como número
                if (data.status) {
                    data.status = parseInt(data.status);
                }
                
                console.log('Datos a enviar:', data);

                fetch('/inputs', {
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
                            text: 'Insumo creado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error('Error al crear insumo:', error);
                        let errorMessage = error.message || 'No se pudo crear el insumo';
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

            // Cargar datos para editar Insumo
            const editInputButtons = document.querySelectorAll('.edit-input');
            editInputButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const inputId = this.getAttribute('data-input');
                    console.log('Editando insumo ID:', inputId);

                    fetch(`/inputs/${inputId}/edit`, {
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
                            document.getElementById('edit_input_id').value = data.id;
                            document.getElementById('edit_funeraria_id').value = data.funeraria_id || '';
                            document.getElementById('edit_nombre').value = data.nombre;
                            document.getElementById('edit_descripcion').value = data.descripcion;
                            document.getElementById('edit_precio_unitario').value = data.precio_unitario;
                            document.getElementById('edit_stock').value = data.stock;
                            document.getElementById('edit_categoria').value = data.categoria;
                            document.getElementById('edit_codigo').value = data.codigo;
                            document.getElementById('edit_status').value = data.status;
                        })
                        .catch(error => {
                            console.error('Error al cargar datos:', error);
                            Swal.fire('Error', 'No se pudieron cargar los datos del insumo', 'error');
                        });
                });
            });

            // Editar Insumo
            const editInputForm = document.getElementById('editInputForm');
            editInputForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const inputId = document.getElementById('edit_input_id').value;
                const formData = new FormData(editInputForm);
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
                
                fetch(`/inputs/${inputId}`, {
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
                        const editModal = bootstrap.Modal.getInstance(document.getElementById('editInputModal'));
                        if (editModal) {
                            editModal.hide();
                        }
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Insumo actualizado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error('Error al actualizar:', error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al actualizar el insumo',
                            icon: 'error'
                        });
                    });
            });

            // Eliminar Insumo (cambiar estatus a inactivo)
            const deleteInputButtons = document.querySelectorAll('.delete-input');
            deleteInputButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const inputId = this.getAttribute('data-input');
                    console.log('Eliminando insumo ID:', inputId);
                    
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
                            fetch(`/inputs/${inputId}`, {
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
                                    'El insumo ha sido desactivado.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(error => {
                                console.error('Error al desactivar:', error);
                                Swal.fire(
                                    'Error',
                                    'No se pudo desactivar el insumo.',
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