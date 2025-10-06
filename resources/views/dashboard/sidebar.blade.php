<div class="sidebar-container p-2 text-white">
    <div class="card bg-dark border-0 shadow-sm">
        <div class="card-body text-center p-2">
            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=random"
                 class="rounded-circle mb-2"
                 alt="{{ auth()->user()->name }}'s avatar"
                 width="50"
                 height="50">
            <h6 class="card-title text-white mb-1">{{ auth()->user()->name }}</h6>
            <p class="card-text text-muted small">{{ $funeralHomeDetails['name'] }}</p>
            <p class="card-text text-muted small">{{ auth()->user()->email }}</p>
        </div>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               aria-current="{{ request()->routeIs('dashboard') ? 'page' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('suppliers.index') }}"
               class="nav-link text-white {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
                <i class="fas fa-user me-2"></i> Proveedores
            </a>
        </li>
        <li>
             <a href="{{ route('empleados.index') }}"
               class="nav-link text-white {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                <i class="fas fa-user me-2"></i> Empleados
            </a>
        </li>
        <li>
            <a href="#"
               class="nav-link text-white {{ request()->routeIs('providers.*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-list me-2"></i> Proveedores
            </a>
        </li>
        <li>
            <a href="{{ route('sucursal.index') }}"
               class="nav-link text-white {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <i class="fas fa-store me-2"></i> Sucursales
            </a>
        </li>
        <li>
            <a href="{{ route('customer.index') }}"
               class="nav-link text-white {{ request()->routeIs('beneficiaries.*') ? 'active' : '' }}">
                <i class="fas fa-boxes me-2"></i> Beneficiarios
            </a>
        </li>
        <li>
            <a href="#"
               class="nav-link text-white {{ request()->routeIs('supplies.*') ? 'active' : '' }}">
            <a href="{{ route('services.index') }}"
               class="nav-link text-white {{ request()->routeIs('services.*') ? 'active' : '' }}">
                <i class="fas fa-hand-holding-heart me-2"></i> Services
            </a>
        </li>
        <li>
            <a href="{{ route('deceased.index') }}"
               class="nav-link text-white {{ request()->routeIs('deceaseds.*') ? 'active' : '' }}">
                <i class="fas fa-cross me-2"></i> Difuntos
            </a>
        </li>
        <li>
            <a href="{{ route('inputs.index') }}"
               class="nav-link text-white {{ request()->routeIs('inputs.*') ? 'active' : '' }}">
                <i class="fas fa-boxes me-2"></i> Insumos
            </a>
        </li>

       <li>
            <a class="nav-link text-white {{ request()->routeIs('reports.*') ? 'active' : '' }}"
               data-bs-toggle="collapse" href="#reportesSubmenu" role="button" aria-expanded="false" aria-controls="reportesSubmenu">
                <i class="fas fa-chart-pie me-2"></i> Reportes
                <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <div class="collapse" id="reportesSubmenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('reports.incomes.index') ? 'active' : '' }}"
                           href="{{ route('suppliers.index') }}">
                            <i class="fas fa-list-ul me-2"></i> Ingresos/Egresos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('reports.expenses.index') ? 'active' : '' }}"
                           href="{{ route('suppliers.create') }}">
                            <i class="fas fa-plus me-2"></i> Empleados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('reports.suppliers.index') ? 'active' : '' }}"
                           href="#">
                            <i class="fas fa-file-alt me-2"></i> Proveedores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('reports.beneficiaries.index') ? 'active' : '' }}"
                           href="{{ route('contract.index') }}">
                            <i class="fas fa-file-alt me-2"></i> Contratos
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
