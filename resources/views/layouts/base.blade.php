<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    @include('layouts.partials.head')
<style>
{{-- .footer { --}}
{{--   position: fixed; --}}
{{--   left: calc(200px + 15px); --}}
{{--   bottom: 0; --}}
{{--   width: calc(100% - 200px); --}}
{{--   background-color: red; --}}
{{--   color: white; --}}
{{--   text-align: center; --}}
{{-- } --}}
</style>
</head>
<body class="d-flex flex-column h-100 ">
    <header class="sticky-top">
        @include('layouts.partials.navbar')
    </header>

    <main class="flex-fill overflow-auto">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <footer class="footer bg-primary text-white text-center py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} Binary Titans. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
