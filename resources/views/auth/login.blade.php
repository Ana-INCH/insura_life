@extends('layouts.base')

@section('title', 'Ingresar a Insura Connect')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endpush

@section('content')
    <h1 class="title">Ingresar a Insura Connect</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Iniciar Sesión</button>
        <a href="#">¿Olvidaste tu contraseña?</a>
        <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
    </form>


    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @push('scripts')
        <script src="{{ asset('js/auth/login.js') }}"></script>
    @endpush
@endsection

