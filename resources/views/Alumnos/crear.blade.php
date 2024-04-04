@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Crear Alumno</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('Alumnos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="numeroDeControl">Número de Control</label>
                            <input type="text" name="numeroDeControl" class="form-control" placeholder="Número de Control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellidoPaterno">Apellido Paterno</label>
                            <input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for="apellidoMaterno">Apellido Materno</label>
                            <input type="text" name="apellidoMaterno" class="form-control" placeholder="Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for="semestre">Semestre</label>
                                <select name="semestre" class="form-control">
                                @for ($i = 1; $i <= 14; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
