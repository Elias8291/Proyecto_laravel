@extends('layouts.auth_app')
@section('title')
    Inicio de Sesión de Administrador
@endsection

@section('content')
<style>
    /* Estilos generales del formulario */
    .card {
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.2s ease-in-out;
        border: 1px solid #ddd;
    }
    .card-header {
        background-color: #5a67d8; /* Un color azul más vibrante */
        color: #fff;
        font-size: 20px;
        border-bottom: 1px solid #4c51bf;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
    }
    .btn-primary {
        background-color: #4c51bf;
        border: none;
        border-radius: 20px; /* Bordes más redondeados */
        padding: 10px 24px;
        font-size: 16px;
        transition: background-color 0.2s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .btn-primary:hover {
        background-color: #434190; /* Un poco más oscuro al pasar el mouse */
    }
    .form-control {
        border-radius: 20px; /* Bordes redondeados para los inputs */
        border: 1px solid #ddd;
        transition: border-color 0.2s, box-shadow 0.2s;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05) inset;
    }
    .form-control:focus {
        border-color: #5a67d8; /* Cambio de color en el foco */
        box-shadow: 0 0 8px rgba(90, 103, 216, 0.2);
    }
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #4c51bf;
        border-color: #4c51bf;
    }
    .alert-danger {
        background-color: #fbdede;
        border-color: #f8d7da;
        color: #842029;
        padding: 10px;
        border-radius: 8px;
    }
    .text-small {
        font-size: 0.875em;
    }
    .form-group {
        margin-bottom: 1rem;
    }
</style>
<div class="card card-primary">
    <div class="card-header"><h4>Inicio de Sesión de Administrador</h4></div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p>Por favor, corrige los siguientes errores:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Ingresa tu correo" tabindex="1" value="{{ old('email', Cookie::get('email')) }}" autofocus required>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Contraseña</label>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('password.request') }}" class="text-small">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                <input id="password" type="password" placeholder="Ingresa tu contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2" required>
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember"{{ old('remember', Cookie::get('remember')) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Recuérdame</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
