@extends('layouts.app')

@section('title', 'Empresas')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('companies.index') }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Empresas</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                    <a href="{{ route('companies.create') }}"><button class="btn btn-primary">Nuevo</button></a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- TODO Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">
            <form action="" method="GET">

                <!-- Row -->
                <div class="row mb-0 mb-sm-3 gx-0">

                    <!-- Buscador -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="search" placeholder="Nombre, DNI..." value=""/> <!-- TODO  value-->
                        </div>
                    </div>

                    <!-- Grado -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select class="form-select" name="grado">
                                <option value="" selected>Grado</option> <!-- TODO cargar grados -->
                            </select>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1">
                        <button class="btn-guapo btn-primary" type="submit">Filtrar</button>
                    </div>

                </div>
                <!-- End Row -->

            </form>
        </div>
        <!-- End Filtros -->

        <!-- Table -->
        <div class="row px-4 gx-0">

            <div class="table-responsive-sm">
                <table class="table table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">CIF</th>
                            <th>Nombre</th>
                            <th class="d-none d-sm-table-cell">Direccion</th>
                            <th class="d-none d-sm-table-cell">Tutor de Empresa</th>
                            <th class="d-none d-sm-table-cell">Mail</th>
                            <th class="d-none d-sm-table-cell">Telefono</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($companies as $c)
                        <tr>
                            <td class="d-none d-sm-table-cell">{{ $c->CIF }}</td>
                            <td>{{ $c->name }}</td>
                            <td class="d-none d-sm-table-cell">{{ $c->location }}</td>
                            <td class="d-none d-sm-table-cell"><a href="#">tutor empresa</a></td> <!-- TODO nombre tutor empresa y que pinchado vaya a su vista show -->
                            <td class="d-none d-sm-table-cell"><a href="#">mail tutor empresa</a></td> <!-- TODO mail tutor empresa -->
                            <td class="d-none d-sm-table-cell"><a href="#">telefono tutor empresa</a></td> <!-- TODO telefono tutor empresa -->
                            <!-- Ver -->
                            <td>
                                <a href="{{ route('companies.show', [$c->id])}}">
                                    <button class="btn">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                            </td>

                            <!-- Editar -->
                            <td>
                                <a href="{{ route('companies.edit', [$c->id]) }}">
                                    <button class="btn">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </a>
                            </td>

                            <!-- Eliminar -->
                            <td>
                                <a href="{{ route('companies.destroy', [$c->id]) }}">
                                    <button class="btn"> 
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


                <!-- Paginacion -->
                <div>
                    {{ $companies->links() }}
                </div>


        </div>
        <!-- End Table -->

    </div>
    <!-- End Row -->

@endsection
