<div class="row g-4 mb-4">
    <div class="col-xxl-3 col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-secondary mb-2">Proveedores</h5>
                        <h2 class="mb-0">{{ $activeSuppliers }}</h2>
                    </div>
                    <i class="fas fa-users fa-2x text-primary"></i>
                </div>
                <div class="mt-3">
                    <span class="badge bg-success"><i class="fas fa-arrow-up"></i> 5.27%</span>
                    <small class="text-muted ms-2">vs mes anterior</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-secondary mb-2">Usuarios</h5>
                        <h2 class="mb-0">{{ $activeUsers }}</h2>
                    </div>
                    <i class="fas fa-users fa-2x text-primary"></i>
                </div>
                <div class="mt-3">
                    <span class="badge bg-success"><i class="fas fa-arrow-up"></i> 5.27%</span>
                    <small class="text-muted ms-2">vs mes anterior</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-secondary mb-2">Ingresos mensuales</h5>
                        <h2 class="mb-0">$ {{ $activeUsers }}</h2>
                    </div>
                    <i class="fas fa-money-bill-wave fa-2x text-primary"></i>
                </div>
                <div class="mt-3">
                    <span class="badge bg-success"><i class="fas fa-arrow-up"></i> 5.27%</span>
                    <small class="text-muted ms-2">vs mes anterior</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-secondary mb-2">Sucursales</h5>
                        <h2 class="mb-0">{{ $activeBranch }} </h2>
                    </div>
                    <i class="fas fa-store fa-2x text-primary"></i>
                </div>
                <div class="mt-3">
                    <span class="badge bg-success"><i class="fas fa-arrow-up"></i> 5.43%</span>
                    <small class="text-muted ms-2">vs mes anterior</small>
                </div>
            </div>
        </div>
    </div>


    {{-- Se pueden agregar más tarjetas de estadísticas aquí --}}
</div>
