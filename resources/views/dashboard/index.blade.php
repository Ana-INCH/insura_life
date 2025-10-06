@extends('layouts.base')

@section('content')
<div class="row">
    @include('dashboard.sidebar')

    <div class="col-lg-10 main-content">
        <div class="container-fluid py-4">
            @include('dashboard.header')

            @include('dashboard.statistics-cards')


            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    @include('dashboard.activity')
                </div>
                <div class="col-lg-4">
                    @include('dashboard.distribution-chart')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .sidebar-container {
        position: fixed;
        top: calc(60px + 1rem);
        bottom: 0;
        left: 0;
        width: 16.667%;
        background-color: #2c3e50;
        overflow-y: auto;
    }

    .main-content {
        margin-left: 16.667%;
        background-color: #f8f9fa;
        min-height: 100vh;
        overflow-y: auto;
    }

    .nav-pills .nav-link.active {
        background-color: #3498db !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // Inicializar gráficos con Chart.js
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('distributionChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Usuarios', 'Contenido', 'Visitas'],
                datasets: [{
                    data: [55, 30, 15],
                    backgroundColor: ['#3498db', '#2ecc71', '#f1c40f']
                }]
            }
        });
    });
</script>
@endpush
