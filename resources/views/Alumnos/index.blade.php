@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Alumnos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @can('crear-alumno')
                        <a class="btn btn-warning" href="{{ route('Alumnos.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">Numero de Control</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Apellido Paterno</th>
                                <th style="color:#fff;">Apellido Materno</th>
                                <th style="color:#fff;">Semestre</th>
                                <th style="color:#fff;">Opciones</th>
                            </thead>
                            <tbody>
                            @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->numeroDeControl }}</td>
                                <td>{{ $alumno->nombre }}</td>
                                <td>{{ $alumno->apellidoPaterno }}</td>
                                <td>{{ $alumno->apellidoMaterno }}</td>
                                <td>{{ $alumno->semestre }}</td>
                                <td>
                                    @can('editar-alumno')
                                    <a href="{{ route('Alumnos.edit', $alumno->numeroDeControl) }}" class="btn btn-primary">Editar</a>
                                    @endcan
                                    @can('borrar-estudiante')
                                    <form action="{{ route('Alumnos.destroy', $alumno->numeroDeControl) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de querer borrar este alumno?')">Borrar</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination justify-content-end">
                            {!! $alumnos->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
