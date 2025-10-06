@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-building"></i> Beneficiario</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCustomerModal">
                <i class="fas fa-plus"></i> Agregar Beneficiario
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($customers->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover border-dark border border-1">
                            <thead>
                                <tr class=" border-dark border border-1 bg-primary text-white">
                                    <th>ID</th>
                                    <th>Funeral Home</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>RFC</th>
                                    <th>Fecha de Registro</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="border border-dark border-1">{{ $customer->id }}</td>
                                        <td class="border border-dark border-1">{{ $customer->funeral_home->name ?? 'N/A' }}
                                        </td>
                                        <td class="border border-dark border-1">{{ $customer->name }}</td>
                                        <td class="border border-dark border-1">{{ $customer->phone }}</td>
                                        <td class="border border-dark border-1">{{ $customer->address }}</td>
                                        <td class="border border-dark border-1">{{ $customer->rfc }}</td>
                                        <td class="border border-dark border-1">{{ $customer->registration_date }}</td>
                                        <td class="border border-dark border-1">
                                            @if ($customer->status == '1')
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-customer" data-bs-toggle="modal"
                                                data-bs-target="#editCustomerModal" data-customer="{{ $customer->id }}">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-customer"
                                                data-customer="{{ $customer->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No hay beneficiarios registrados.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Beneficiario -->
    <div class="modal fade" id="createCustomerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Beneficiario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createCustomerForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Funeral Home</label>
                            <select name="funeral_home_id" class="form-control" required>
                                <option value="">Selecciona una funeraria</option>
                                @foreach ($funeralHomes as $funeralHome)
                                    <option value="{{ $funeralHome->id }}">{{ $funeralHome->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">RFC</label>
                                <input type="text" class="form-control" name="rfc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="registration_date">
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
                        <button type="submit" class="btn btn-primary">Guardar Beneficiario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Editar Beneficiario -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Beneficiario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editCustomerForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="customer_id" id="edit_customer_id">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="phone" id="edit_phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="edit_email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="address" id="edit_address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">RFC</label>
                                <input type="text" class="form-control" name="rfc" id="edit_rfc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="registration_date"
                                    id="edit_registration_date">
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
                        <button type="submit" class="btn btn-primary">Actualizar Beneficiario</button>
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

            // Crear Beneficiario
            const createCustomerForm = document.getElementById('createCustomerForm');
            createCustomerForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(createCustomerForm);
                const data = Object.fromEntries(formData.entries());

                fetch('/customer/store', {
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
                        Swal.fire('¡Éxito!', 'Benefiacirio creado correctamente', 'success')
                            .then(() => location.reload());
                    })
                    .catch(error => {
                        Swal.fire('Error', 'No se pudo crear el Beneficiario', 'error');
                    });
            });
            // Cargar datos para editar Beneficiario.

            const editCustomerButtons = document.querySelectorAll('.edit-customer');
            editCustomerButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const customerId = this.getAttribute('data-customer');

                    fetch(`/customer/${customerId}/show`, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if (response.ok) return response.json();
                            throw new Error('Error al cargar los datos');
                        })
                        .then(data => {
                            document.getElementById('edit_customer_id').value = data.id;
                            document.getElementById('edit_funeral_home_id').value = data
                                .funeral_home_id;
                            document.getElementById('edit_name').value = data.name;
                            document.getElementById('edit_phone').value = data.phone;
                            document.getElementById('edit_address').value = data.address;
                            document.getElementById('edit_email').value = data.email;
                            document.getElementById('edit_rfc').value = data.rfc;
                            document.getElementById('edit_registration_date').value = data
                                .registration_date;
                            document.getElementById('edit_status').value = data.status;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            });

            // Edita un Beneficiario
            // Actualizar Beneficiario mediante POST con _method=PUT.
            const editCustomerForm = document.getElementById('editCustomerForm');
            editCustomerForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const customerId = document.getElementById('edit_customer_id').value;
                const formData = new FormData(editCustomerForm);
                const formDataObj = {};
                formData.forEach((value, key) => {
                    formDataObj[key] = value;
                });
                const body = JSON.stringify(formDataObj);

                fetch(`/customer/${customerId}`, {
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
                            'editCustomerModal'));
                        if (editModal) {
                            editModal.hide();
                        }
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Beneficiario actualizado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al actualizar el Beneficiario',
                            icon: 'error'
                        });
                    });
            });
            // Eliminar Beneficiario
            const deleteCustomerButtons = document.querySelectorAll('.delete-customer');
            deleteCustomerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const customerId = this.getAttribute('data-customer');

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
                            fetch(`/customer/${customerId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire('¡Eliminado!',
                                            'El Beneficiario ha sido eliminado.',
                                            'success')
                                        .then(() => location.reload());
                                })
                                .catch(error => {
                                    Swal.fire('Error',
                                        'No se pudo eliminar el Beneficiario.',
                                        'error');
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
