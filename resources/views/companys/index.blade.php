@extends('layouts.app')

@section('title', 'Empresas')

@section('main')

    <!-- Titulo -->
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Empresas</h1>
        <a href="{{ route('companys.create') }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>
    <!-- End Titulo -->

    <!-- Filtros -->
        <!-- TODO Buscador sólo versión móvil -->
    <!-- End Filtros -->

    <!-- Row -->
    <div class="row">
        <div class="col-12 px-4">

            <!-- Tabla -->
            <div class="table-responsive">
                <table class="tablita-guapa table-striped table-bordered table-hovers" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CIF</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Tutor de Empresa</th>
                            <th>Contacto</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companys as $c)
                            <tr>
                                <td>{{ $c->cif }}</td> <!-- TODO cif -->
                                <td>{{ }}</td> <!-- TODO nombre empresa -->
                                <td>{{ }}</td> <!-- TODO direccion  -->
                                <td><a href="#">{{  }}</a></td> <!-- TODO nombre tutor empresa -->
                                <td>{{ }}</td> <!-- TODO mail tutor empresa -->
                                <td><a href="#">Editar</a></td> <!-- TODO enlace -->
                                <td><button>Eliminar</button></td> <!-- TODO enlace -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginacion -->
                <div>
                    {{ $companys->links() }}
                </div>
                <!-- End Paginacion -->

            </div>
            <!-- End Tabla -->

        </div>
    </div>
    <!-- End Row -->

@endsection
