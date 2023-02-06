@extends('layouts.app')

@section('title', "Empresa | $company->name")

@section('main')

    <!-- Breadcrumbs -->
    {{  Breadcrumbs::render('companies.show', $company) }}

<<<<<<< HEAD
            <!-- Titulo + Mail -->
            <div class="d-flex flex-column justify-content-start">
                <h1 class="h3 mb-0">{{ $company->name }}</h1>
                <p class="mb-0">{{ $coordinator->CIF }}</p>
                <p class="mb-0">{{ $coordinator->location }}</p>
            </div>

            <!-- Boton Editar -->
            <a href="{{ route('companies.edit', [$company->id]) }}" class="d-inline-block btn btn-sm btn-secondary shadow-sm text-primary">
                Editar
            </a>

        </div>
        <!-- End Box -->
    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row mb-2">

        <!-- Info Tutor -->
        <div class="d-flex flex-column justify-content-start">
            <h1 class="h3 mb-3">Contacto</h1>
            <p><strong>Nombre:</strong> {{ $coordinator->fullName() }}</p>
            <p><strong>Mail:</strong> {{ $coordinator->email }}</p>
            <p><strong>Telefono:</strong>  {{ $coordinator->phone }}</p>
        </div>
        <!-- End Info Tutor -->

    </div>
    <!-- End Row -->

    <!-- Filtros -->
    <div class="row px-4 gx-sm-3 gx-0">
        <form action="" method="get">
            <input type="text" name="search" value="{{ $old_search }}">
            
            <!-- Curso -->
            <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
                <div class="form-group">
                    <select class="form-select" name="course">
                        <option value="" @selected(!$old_course)>Curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" @selected($course->id == $old_course)>{{ $course->toText() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Checkboxes -->
            <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">
    
                <!-- Titulados -->
                <div class="form-check d-flex justify-content-center align-items-center">
                    <input class="form-check-input" type="checkbox" value="1" name="graduated" id="graduated" @checked($old_graduated)>
                    <label class="form-check-label px-2 mt-1" for="graduated">
                        Titulados
                    </label>
                </div>
    
                <!-- No Activos -->
                <div class="form-check d-flex justify-content-center align-items-center">
                    <input class="form-check-input" type="checkbox" value="1" name="notactive" id="notactive" @checked($old_notactive)>
                    <label class="form-check-label px-2 mt-1" for="notactive">
                        No Activos
                    </label>
                </div>
    
            </div>
            <!-- End Checkboxes -->

            <!-- Submit -->
            <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1">
                <button class="btn-guapo btn-primary" type="submit">Filtrar</button>
            </div>
        </form>
    </div>
    <!-- End Filtros -->

    <!-- Row -->
    <div class="row mb-2">
        <div class="table-responsive">
            <table class="tablita-guapa table-striped table-bordered table-hovers" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Mail</th>
                        <th>Telefono</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->dni}}</td>
                            <td>{{$student->fullName()}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>

                            <!-- Ver -->
                            <td>
                                <a href="{{ route('students.show', [$student->id])}}" class="btn">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>

                            <!-- Editar -->
                            <td> 
                                <a class="btn" href="{{ route('students.edit', [$student->id]) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>

                            <!-- Eliminar -->
                            <td>
                                @include('partials.general.deletebutton', [
                                    'route' => route('students.destroy', [$student->id])
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginacion -->
            <div>
                {{ $students->links() }}
            </div>
            <!-- End Paginacion -->

        </div>
        <!-- End Table -->

    </div>
    <!-- End Row -->

    <a href="{{ route('companies.index') }}">Volver</a>
=======
    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">
                <div>
                    <h1 class="h3 mb-0">{{ $company->name }}</h1>
                    <p class="text-uppercase">{{ $company->CIF }}</p>
                    <p class="mb-0">{{ $company->location }}</p>
                </div>
                <div>
                    <a href="{{ route('companies.edit', [$company->id]) }}"><button class="btn btn-secondary text-primary">Editar</button></a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Alumnos -->
        <div class="row px-4 gx-0 my-3">

            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Alumnos</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                </div>
            </div>

            <!-- Caja Filtros -->
            <div class="row mb-0 mt-3 mb-sm-3 mx-2 gx-0">

                <!-- Filtros -->
                <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">

                    <form action="" method="GET"> <!-- TODO accion -->

                        <!-- Row -->
                        <div class="row mb-0 mb-sm-3 gx-0">

                            <!-- Buscador -->
                            <div class="col-12 mb-3 col-sm-4 mb-sm-0 px-sm-1">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="search" placeholder="Nombre, DNI..." value=""/> <!-- TODO value -->
                                </div>
                            </div>

                            <!-- Curso -->
                            <div class="col-12 mb-3 col-sm-4 mb-sm-0 px-sm-1">
                                <div class="form-group">
                                    <select name="curso" class="form-select">
                                        <option value="" selected>Curso</option>
                                        <!-- TODO foreach -->
                                    </select>
                                </div>
                            </div>

                            <!-- Checkboxes -->
                            <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">

                                <!-- Titulados -->
                                <div class="form-check d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" name="titulados">
                                    <label class="form-check-label px-2 mt-1" for="titulados">
                                        Titulados
                                    </label>
                                </div>

                                <!-- No Activos -->
                                <div class="form-check d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" name="no-activos">
                                    <label class="form-check-label px-2 mt-1" for="no-activos">
                                        No Activos
                                    </label>
                                </div>

                            </div>
                            <!-- End Checkboxes -->

                            <!-- Submit -->
                            <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1">
                                <button class="btn-guapo btn-primary" type="submit">Filtrar</button>
                            </div>

                        </div>
                        <!-- End Row -->

                    </form>

                </div>
                <!-- End Filtros -->

            </div>
            <!-- End Caja Filtros -->

            <div class="table-responsive-sm">
                <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">DNI</th>
                            <th>Nombre</th>
                            <th class="d-none d-sm-table-cell">Mail</th>
                            <th class="d-none d-sm-table-cell">Telefono</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- TODO foreach -->
                    </tbody>
                </table>
            </div>


                <!-- Paginacion -->
                <div>
                    <!-- TODO paginacion -->
                </div>


        </div>
        <!-- End Alumnos -->

    </div>
>>>>>>> views-v


@endsection
