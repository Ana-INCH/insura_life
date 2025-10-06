<div class="d-flex justify-content-between align-items-center mb-4 p-3 rounded-3" style="background: #f8f9fa; border: 2px solid #e9ecef;">
    <!-- Mensaje de bienvenida -->
    <div class="flex-grow-1">
        <h2 class="mb-0 text-primary">👋 Bienvenido, {{ auth()->user()->name }}</h2>
        <p class="text-muted mb-0 small">Tienes 12 tareas pendientes esta semana</p>
    </div>

    <!-- Banner-botón Premium -->
    <div class="ms-4 bg-warning-gradient rounded-2 p-2 shadow-sm hover-scale"
         style="background: linear-gradient(45deg, #ffd700, #ffc107); cursor: pointer; transition: all 0.3s ease;">
        <div class="d-flex align-items-center gap-2 px-2">
            <div class="bg-white rounded-circle p-2">
                <i class="fas fa-crown text-warning"></i>
            </div>

            <div class="text-start">
                <p class="mb-0 small fw-bold text-dark"><a href="{{ route('premium.index') }}" style="color: inherit;">Desbloquea Premium</a></p>
                <p class="mb-0 x-small text-muted">Obtén beneficios exclusivos</p>
            </div>

        </div>
    </div>
</div>

<style>
    .hover-scale:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .bg-warning-gradient {
        border: 1px solid rgba(255, 193, 7, 0.3);
    }

    .x-small {
        font-size: 0.75em;
    }
</style>
