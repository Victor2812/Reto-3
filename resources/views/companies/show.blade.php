@extends('layouts.app')

@section('title', "Empresa | $company->name")

@section('main')

    <!-- Titulo -->
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">{{ $company->name }}</h1>
        <a href="{{ route('companies.edit', [$company->id]) }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Editar
        </a>
    </div>
    <!-- End Titulo -->

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
                        <tr>
                            <td>{{ $company->CIF }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->location }}</td>
                            <td><a href="#">{{ 'a' }}</a></td> <!-- TODO nombre tutor empresa -->
                            <td>{{ 'a' }}</td> <!-- TODO mail tutor empresa -->
                            <td><a href="{{ route('companies.show', [$company->id]) }}">Ver</a></td>
                            <td><a href="{{ route('companies.edit', [$company->id]) }}">Editar</a></td> <!-- TODO enlace -->
                            <td>
                                @include('partials.general.deletebutton', [
                                    'route' => route('companies.destroy', [$company->id])
                                ])
                            </td> <!-- TODO enlace -->
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Tabla -->
        </div>
    </div>
    <!-- End Row -->

    <a href="{{ route('companies.index') }}">Volver</a>
@endsection
