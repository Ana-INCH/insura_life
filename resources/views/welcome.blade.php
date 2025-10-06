@extends('layouts.base')

@section('title', 'Bienvenido a Insura Connect')

@section('content')
<!-- Hero Section -->
<section class="hero bg-light">
    <div class="container-fluid py-5">
        <div class="row align-items-center g-5">
            <!-- Main Content -->
            <div class="col-lg-7 order-lg-1">
                <h1 class="display-4 fw-bold mb-4">Digitaliza la gestión de tu funeraria</h1>
                <p class="lead text-muted mb-4">
                    Transforma tu negocio con Insura Connect, la plataforma líder en gestión funeraria inteligente.
                    Optimiza procesos, reduce tiempos y ofrece un mejor servicio a tus clientes.
                </p>
                <div class="d-flex gap-3">
                    <a href="/login" class="btn btn-primary btn-lg px-5">Comenzar ahora</a>
                    <a href="#contacto" class="btn btn-outline-primary btn-lg px-5">Contactar</a>
                </div>
            </div>

            <!-- Carousel -->
            <div class="col-lg-5 order-lg-0">
                <div class="carousel slide shadow-lg rounded-3" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/digitalizacion.jpg') }}" class="d-block w-100" alt="Digitalización">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/administracion.jpg') }}" class="d-block w-100" alt="Administración">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/handshake.jpg') }}" class="d-block w-100" alt="Colaboración">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Layout -->
<div class="container my-5">
    <div class="row g-5">
        <!-- Main Content -->
        <main class="col-md-8">
            <!-- How It Works -->
            <section class="mb-5">
                <h2 class="mb-4 fw-bold">Cómo funciona Insura Connect</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h3 class="h5"><span class="badge bg-primary me-2">1</span> Registro</h3>
                                <p>Configuración inicial rápida y soporte personalizado para comenzar a operar en minutos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h3 class="h5"><span class="badge bg-primary me-2">2</span> Implementación</h3>
                                <p>Migración segura de datos y capacitación práctica para tu equipo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials -->
            <section class="mb-5">
                <h2 class="mb-4 fw-bold">Casos de éxito</h2>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="mb-3">"Insura Connect revolucionó nuestra gestión diaria, reduciendo tiempos administrativos en un 60%"</p>
                            <footer class="blockquote-footer">Juan Pérez, <cite>Funeraria La Paz</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </section>
        </main>

        <!-- Sidebar -->
        <aside class="col-md-4">
            <!-- Features Card -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Características clave</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex">
                            <span class="me-2 text-primary">✓</span>
                            <span>Gestión integral de clientes y proveedores</span>
                        </li>
                        <li class="mb-3 d-flex">
                            <span class="me-2 text-primary">✓</span>
                            <span>Reportes financieros automatizados</span>
                        </li>
                        <li class="mb-3 d-flex">
                            <span class="me-2 text-primary">✓</span>
                            <span>Plataforma 100% en la nube</span>
                        </li>
                        <li class="d-flex">
                            <span class="me-2 text-primary">✓</span>
                            <span>Soporte técnico 24/7</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="h5 mb-3">Acceso rápido</h3>
                    <div class="list-group">
                        <a href="/recursos" class="list-group-item list-group-item-action">Documentación técnica</a>
                        <a href="/soporte" class="list-group-item list-group-item-action">Soporte en línea</a>
                        <a href="/precios" class="list-group-item list-group-item-action">Planes y precios</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>

<!-- Full-Width Banner -->
<section class="my-5">
    <div class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/servicio1.png') }}" class="d-block w-100" alt="Publicidad 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/servicio2.png') }}" class="d-block w-100" alt="Publicidad 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/servicio3.jpg') }}" class="d-block w-100" alt="Publicidad 3">
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="planes" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Planes de Suscripción</h2>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary active">Mensual</button>
                <button type="button" class="btn btn-outline-primary">Anual (-20%)</button>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Free Plan -->
            <div class="col-lg-4">
                <div class="card plan-card h-100 shadow">
                    <div class="card-body">
                        <h3 class="h4 mb-3">Básico</h3>
                        <div class="mb-4">
                            <span class="price-display text-primary">$0</span>
                            <span class="text-muted">/mes</span>
                        </div>
                        <ul class="feature-list list-unstyled">
                            <li><i class="bi bi-check2 text-primary me-2"></i>Hasta 50 registros/mes</li>
                            <li><i class="bi bi-check2 text-primary me-2"></i>1 usuario administrador</li>
                            <li><i class="bi bi-x text-muted me-2"></i>Soporte prioritario</li>
                            <li><i class="bi bi-x text-muted me-2"></i>Hasta 5 sucursales</li>
                            <li><i class="bi bi-x text-muted me-2"></i>Reportes avanzados</li>
                        </ul>
                        <a href="/registro" class="btn btn-outline-primary w-100">
                            Comenzar Gratis
                        </a>
                    </div>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="col-lg-4">
                <div class="card plan-card h-100 shadow border-primary border-2">
                    <div class="position-relative">
                        <span class="popular-badge badge bg-primary">MÁS POPULAR</span>
                    </div>
                    <div class="card-body">
                        <h3 class="h4 mb-3">Premium</h3>
                        <div class="mb-4">
                            <span class="price-display text-primary">$599 mxn</span>
                            <span class="text-muted">/mes</span>
                        </div>
                        <ul class="feature-list list-unstyled">
                            <li><i class="bi bi-check2 text-primary me-2"></i>Registros ilimitados</li>
                            <li><i class="bi bi-check2 text-primary me-2"></i>Hasta 5 usuarios administradores</li>
                            <li><i class="bi bi-check2 text-primary me-2"></i>Soporte Técnico 24/7</li>
                            <li><i class="bi bi-check2 text-primary me-2"></i>Acceso a funcionalidades avanzadas (Convenios, Reportes)</li>
                            <li><i class="bi bi-check2 text-primary me-2"></i>Hasta 10 sucursales adicionales</li>
                        </ul>
                        <a href="{{ route('premium.index') }}" class="btn btn-primary w-100">
                            Elegir Premium
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <p class="text-muted">¿Necesitas un plan personalizado?
                <a href="#contacto" class="text-decoration-none">Contáctanos para una solución a medida</a>
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contacto" class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <h2 class="fw-bold mb-4">¿Listo para transformar tu negocio?</h2>
                <p class="lead text-muted">Agenda una demostración personalizada y descubre cómo podemos optimizar tus operaciones.</p>
                <div class="mt-4">
                    <h3 class="h5">Contacto directo</h3>
                    <p class="mb-1"><i class="bi bi-telephone me-2"></i> +1 (555) 123-4567</p>
                    <p><i class="bi bi-envelope me-2"></i> soporte@insuraconnect.com</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nombre completo">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Correo electrónico">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Mensaje"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Enviar consulta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
