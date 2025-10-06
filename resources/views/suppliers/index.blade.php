@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-truck"></i> Proveedores</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSupplierModal" onclick="document.getElementById('createSupplierForm').reset();">
                <i class="fas fa-plus"></i> Agregar Proveedor
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if($suppliers->count())
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover shadow-sm" style="border-radius: 10px; overflow: hidden; border-collapse: separate;">
                        <thead>
                            <tr class="bg-primary text-white" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">ID</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Nombre</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Contacto</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Teléfono</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Email</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Dirección</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Estatus</th>
                                <th class="align-middle text-center" style="padding: 15px; font-weight: 600; border-top: none;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                                <tr class="align-middle" style="transition: all 0.2s ease-in-out;" onmouseover="this.style.backgroundColor='#f8f9fc';" onmouseout="this.style.backgroundColor=''">
                                    <td class="text-center fw-bold" style="padding: 12px;">{{ $supplier->id }}</td>
                                    <td style="padding: 12px;">{{ $supplier->name }}</td>
                                    <td style="padding: 12px;">{{ $supplier->contact }}</td>
                                    <td style="padding: 12px;">
                                        <span class="badge bg-secondary rounded-pill" style="padding: 6px 10px; font-size: 0.85em;">
                                            {{ $supplier->phone }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px;">
                                        <a href="mailto:{{ $supplier->email }}" style="text-decoration: none; color: #4e73df;">
                                            {{ $supplier->email }}
                                        </a>
                                    </td>
                                    <td style="padding: 12px;">
                                        <span title="{{ $supplier->address }}" style="cursor: pointer; display: block; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $supplier->address }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px; text-align: center;">
                                        @if($supplier->status == 1)
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
                                            <button class="btn btn-sm edit-supplier" style="background-color: #36b9cc; color: white; margin-right: 5px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.2s ease-in-out;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editSupplierModal"
                                                    data-supplier="{{ $supplier->id }}"
                                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.15)';"
                                                    onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm delete-supplier" style="background-color: #e74a3b; color: white; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.2s ease-in-out;"
                                                    data-supplier="{{ $supplier->id }}"
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
                    <p>No hay proveedores registrados.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Proveedor -->
    <div class="modal fade" id="createSupplierModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- No se especifica action para evitar envío tradicional -->
                <form id="createSupplierForm">
                    <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="funeral_home_id" value="{{ $funeralHomeDetails['id'] }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Contacto</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" class="form-control" name="contact">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" class="form-control" name="phone">
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Dirección</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <input type="text" class="form-control" name="address">
                                    </div>
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

    <!-- Modal Editar Proveedor -->
    <div class="modal fade" id="editSupplierModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editSupplierForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="supplier_id" id="edit_supplier_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i>
                                        <input type="text" class="form-control" name="name" id="edit_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Contacto</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="contact" id="edit_contact">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" class="form-control" name="phone" id="edit_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control" name="email" id="edit_email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Dirección</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <input type="text" class="form-control" name="address" id="edit_address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="status_container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('editSupplierForm').reset();">
                            <i class="fas fa-times"></i>
                            Cancelar
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

        // Función para concatenar mensajes de error en caso de que existan varios
        function formatErrors(errorObj) {
            let messages = [];
            for (const key in errorObj) {
                if (errorObj.hasOwnProperty(key)) {
                    messages.push(errorObj[key].join(', '));
                }
            }
            return messages.join('<br>');
        }

        // Crear Proveedor: se envía en POST con JSON
        const createSupplierForm = document.getElementById('createSupplierForm');
        createSupplierForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(createSupplierForm);
            const data = Object.fromEntries(formData.entries());

            fetch('/suppliers/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
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
                    text: 'Proveedor creado correctamente',
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                let errorMessage = error.message || 'No se pudo crear el proveedor';
                if(error.errors) {
                    errorMessage += '<br>' + formatErrors(error.errors);
                }
                Swal.fire({
                    title: 'Error',
                    html: errorMessage,
                    icon: 'error'
                });
                console.error('Error al crear proveedor:', error);
            });
        });

        // Cargar datos para editar proveedor.
        const editSupplierButtons = document.querySelectorAll('.edit-supplier');
        editSupplierButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const supplierId = this.getAttribute('data-supplier');
                console.log(supplierId);

                fetch(`/suppliers/${supplierId}/show`, {
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
                    console.log(data);
                    document.getElementById('edit_supplier_id').value = data.id;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_contact').value = data.contact;
                    document.getElementById('edit_phone').value = data.phone;
                    document.getElementById('edit_email').value = data.email;
                    document.getElementById('edit_address').value = data.address;
                    // Borra el select de estatus actual, sea cual sea.
                    document.getElementById('status_container').innerHTML = '';

                    if (data.status === 0) {
                        const statusInputGroup = document.createElement('div');
                        statusInputGroup.classList.add('input-group', 'mb-3');

                        const statusInputGroupText = document.createElement('span');
                        statusInputGroupText.classList.add('input-group-text');
                        statusInputGroupText.innerHTML = '<i class="bi bi-check-circle"></i>';

                        const statusSelect = document.createElement('select');
                        statusSelect.name = 'status';
                        statusSelect.classList.add('form-control');
                        statusSelect.id = `edit_status_${data.id}`;

                        const optionActive = document.createElement('option');
                        optionActive.value = '1';
                        optionActive.text = 'Activo';

                        const optionInactive = document.createElement('option');
                        optionInactive.value = '0';
                        optionInactive.text = 'Inactivo';
                        optionInactive.selected = true;

                        statusSelect.appendChild(optionActive);
                        statusSelect.appendChild(optionInactive);

                        statusInputGroup.appendChild(statusInputGroupText);
                        statusInputGroup.appendChild(statusSelect);

                        document.getElementById('status_container').appendChild(statusInputGroup);
                    }
                })
                .catch(error => {
                    console.error(error);
                });
            });
        });

        // Actualizar Proveedor mediante POST con _method=PUT.
        const editSupplierForm = document.getElementById('editSupplierForm');
        editSupplierForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const supplierId = document.getElementById('edit_supplier_id').value;
            const formData = new FormData(editSupplierForm);
            const formDataObj = {};
            formData.forEach((value, key) => {
                formDataObj[key] = value;
            });
            const body = JSON.stringify(formDataObj);
            console.log(body);

            fetch(`/suppliers/${supplierId}`, {
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
                const editModal = bootstrap.Modal.getInstance(document.getElementById('editSupplierModal'));
                if(editModal) {
                    editModal.hide();
                }
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Proveedor actualizado correctamente',
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                console.error(error);
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al actualizar el proveedor',
                    icon: 'error'
                });
            });
        });

        // Eliminar Proveedor: utilizando POST con _method=DELETE.
        const deleteSupplierButtons = document.querySelectorAll('.delete-supplier');
        deleteSupplierButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const supplierId = this.getAttribute('data-supplier');
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
                    if(result.isConfirmed) {
                        const formData = new URLSearchParams();
                        formData.append('_token', csrfToken);
                        formData.append('_method', 'DELETE');

                        fetch(`/suppliers/${supplierId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: formData.toString()
                        })
                        .then(response => {
                            if(response.ok) return response.json();
                            throw new Error('Error al eliminar');
                        })
                        .then(data => {
                            Swal.fire(
                                '¡Eliminado!',
                                'El proveedor ha sido eliminado.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.fire(
                                'Error',
                                'No se pudo eliminar el proveedor.',
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
