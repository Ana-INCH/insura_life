@extends('layouts.dashboard')

@section('dashboardContent')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-building"></i> Contratos</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createContractModal">
                <i class="fas fa-plus"></i> Agregar Contrato
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($contracts->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover border-dark border border-1">
                            <thead>
                                <tr class=" border-dark border border-1 bg-primary text-white">
                                    <th>ID</th>
                                    <th>Beneficiario</th>
                                    <th>Difunto</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha de Fin</th>
                                    <th>Monto Total</th>
                                    <th>Estato</th>
                                    <th>Terminos</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                    <tr>
                                        <td class="border border-dark border-1">{{ $contract->id }}</td>
                                        
                                        <td class="border border-dark border-1">{{ $contract->customer_id }}</td>
                                        <td class="border border-dark border-1">{{ $contract->deceased_id }}</td>
                                        <td class="border border-dark border-1">{{ $contract->start_date }}</td>
                                        <td class="border border-dark border-1">{{ $contract->end_date }}</td>
                                        <td class="border border-dark border-1">{{ $contract->total_amount }}</td>
                                        <td class="border border-dark border-1">{{ $contract->state }}</td>
                                        <td class="border border-dark border-1">{{ $contract->terms }}</td>
                                        <td class="border border-dark border-1">
                                            @if ($contract->status == '1')
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-contract" data-bs-toggle="modal"
                                                data-bs-target="#editContractModal" data-contract="{{ $contract->id }}">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-contract"
                                                data-contract="{{ $contract->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No hay Contratos registradas.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Crear Contracto -->
    <div class="modal fade" id="createContractModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Contrato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createContractForm">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Beneficiario</label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">Selecciona un Beneficiario</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Difunto</label>
                            <select name="deceased_id" class="form-control" required>
                                <option value="">Selecciona un Difunto</option>
                                @foreach ($deceaseds as $deceased)
                                    <option value="{{ $deceased->id }}">{{ $deceased->name }}</option>
                                @endforeach
                            </select>
                        </div>
   
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Fin</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Monto Total</label>
                                <input type="text" class="form-control" name="total_amount">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" name="state">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Terminos</label>
                                <input type="text" class="form-control" name="terms">
                            </div>
                            <div class="col-md-6 mb-3">
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
                        <button type="submit" class="btn btn-primary">Guardar Contrato</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Editar Contrato -->
    <div class="modal fade" id="editContractModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Contrato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editContractForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="contract_id" id="edit_contract_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Beneficiario</label>
                            <select name="customer_id" class="form-control" required id="edit_customer_id">
                                <option value="">Selecciona un Beneficiario</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Difunto</label>
                            <select name="deceased_id" class="form-control" required id="edit_deceased_id">
                                <option value="">Selecciona un Difunto</option>
                                @foreach ($deceaseds as $deceased)
                                    <option value="{{ $deceased->id }}">{{ $deceased->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control" name="start_date" id="edit_start_date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Fin</label>
                                <input type="date" class="form-control" name="end_date" id="edit_end_date">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Monto Total</label>
                                <input type="text" class="form-control" name="total_amount" id="edit_total_amount">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" name="state" id="edit_state">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Terminos</label>
                                <input type="text" class="form-control" name="terms" id="edit_terms">
                            </div>
                            <div class="col-md-6 mb-3">
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
                        <button type="submit" class="btn btn-primary">Actualizar Contrato</button>
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

            // Crear Contracto
            const createContractForm = document.getElementById('createContractForm');
            createContractForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(createContractForm);
                const data = Object.fromEntries(formData.entries());

                fetch('/contract/store', {
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
                        Swal.fire('¡Éxito!', 'Contracto creado correctamente', 'success')
                            .then(() => location.reload());
                    })
                    .catch(error => {
                        Swal.fire('Error', 'No se pudo crear el Contracto', 'error');
                    });
            });
            // Cargar datos para editar Contracto.
            const editContractButtons = document.querySelectorAll('.edit-contract');
            editContractButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const contractId = this.getAttribute('data-contract');

                    fetch(`/contract/${contractId}/show`, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if (response.ok) return response.json();
                            throw new Error('Error al cargar los datos');
                        })
                        .then(data => {
                            document.getElementById('edit_contract_id').value = data.id;
                            document.getElementById('edit_customer_id').value = data
                                .customer_id;
                                document.getElementById('edit_deceased_id').value = data
                                .deceased_id;
                            document.getElementById('edit_start_date').value = data.start_date;
                            document.getElementById('edit_end_date').value = data.end_date;
                            document.getElementById('edit_total_amount').value = data.total_amount;
                            document.getElementById('edit_state').value = data.state;
                            document.getElementById('edit_terms').value = data.terms;
                            document.getElementById('edit_status').value = data.status;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            });

            // Edita una Contrato
            // Actualizar Contrato mediante POST con _method=PUT.
            const editContractForm = document.getElementById('editContractForm');
            editContractForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const contractId = document.getElementById('edit_contract_id').value;
                const formData = new FormData(editContractForm);
                const formDataObj = {};
                formData.forEach((value, key) => {
                    formDataObj[key] = value;
                });
                const body = JSON.stringify(formDataObj);
                fetch(`/contract/${contractId}`, {
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
                            'editContractModal'));
                        if (editModal) {
                            editModal.hide();
                        }
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Contrato actualizado correctamente',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al actualizar el Contrato',
                            icon: 'error'
                        });
                    });
            });

            // Eliminar Contrato
            const deleteContractButtons = document.querySelectorAll('.delete-contract');
            deleteContractButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const contractId = this.getAttribute('data-contract');

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
                            fetch(`/contract/${contractId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire('¡Eliminado!',
                                            'El Contrato ha sido eliminado.', 'success')
                                        .then(() => location.reload());
                                })
                                .catch(error => {
                                    Swal.fire('Error',
                                        'No se pudo eliminar el contrato.', 'error');
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
