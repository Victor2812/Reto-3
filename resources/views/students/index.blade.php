@extends('layouts.app')

@section('title', 'Alumnos')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('students.index') }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Alumnos</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                    <a href="{{ route('students.create') }}"><button class="btn btn-primary">Nuevo</button></a>
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
                            <input type="text" class="form-control" name="search" placeholder="Nombre, DNI..." value="{{ $old_search }}"/> <!-- TODO  value-->
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

                    <!-- Tutor Academico -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                            <div class="form-group">
                                <select class="form-select" name="atutor">
                                    <option value="" @selected(!$old_atutor)>Tutor Académico</option> <!-- TODO cargar tutor academico -->
                                    @foreach ($academicTutors as $tutor)
                                        <option value="{{ $tutor->id }}" @selected($old_atutor == $tutor->id)>{{ $tutor->fullName() }}</option> <!-- TODO cargar cursos -->
                                    @endforeach
                                </select>
                            </div>
                    </div>

                    <!-- Empresa -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select class="form-select" name="company">
                                <option value="" @selected(!$old_company)>Empresa</option> <!-- TODO cargar empresa -->
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @selected($old_company == $company->id)>{{ $company->name }}</option> <!-- TODO cargar cursos -->
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-sm-3 gx-0">

                    <!-- Tutor Empresa -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select class="form-select" name="ctutor">
                                <option value="" selected>Tutor Empresa</option> <!-- TODO cargar empresa -->
                                @foreach ($companyTutors as $tutor)
                                    <option value="{{ $tutor->id }}">{{ $tutor->fullName() }}</option> <!-- TODO cargar cursos -->
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Curso -->
                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select class="form-select" name="course">
                                <option value="" @selected(!$old_course)>Curso</option> <!-- TODO cargar cursos -->
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" @selected($course->id == $old_course)>{{ $course->toText() }}</option> <!-- TODO cargar cursos -->
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Año Academico -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select class="form-select" name="syear">
                                <option value="" @selected(!$old_syear)>Año academico</option> <!-- TODO cargar curso academico -->
                                @foreach ($schoolYears as $year)
                                    <option value="{{ $year->id }}" @selected($year->id == $old_syear)>{{ $year->toText() }}</option> <!-- TODO cargar cursos -->
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
                    @foreach ($students as $student)
                        <tr>
                            <td class="d-none d-sm-table-cell">{{ $student->dni }}</td>
                            <td>{{ $student->fullName() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $student->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ $student->phone }}</td>

                            <!-- Ver -->
                            <td>
                                <a href="{{ route('students.show', [$student->id])}}">
                                    <button class="btn">
                                        <i class="bi bi-eye"></i>
                                    </button>
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
            </div>

            <!-- Paginacion -->
            <div>
                {{ $students->links() }}
            </div>


        </div>
        <!-- End Table -->

    </div>
    <!-- End Row -->

@endsection
