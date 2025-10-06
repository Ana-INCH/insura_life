@extends('layouts.base')

@section('title', 'Registrarse en Insura Connect')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endpush

@section('content')
    <h1 class="title">Registrarse en Insura Connect</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Nombre completo:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit">Registrarse</button>
        <a href="{{ route('login') }}">¿Ya tienes una cuenta? Inicia sesión</a>
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
        <script src="{{ asset('js/auth/register.js') }}"></script>
    @endpush
@endsection
