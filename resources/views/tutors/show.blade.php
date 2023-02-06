@extends('layouts.app')

@section('title', "Tutor | $tutor->name $tutor->surname")

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('tutors.show', $tutor) }}

<!-- Row -->
<div class="row mb-4">
        <!-- Box -->
        <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">

            <!-- Titulo + Mail -->
            <div class="d-flex flex-column justify-content-start">
                <h1 class="h3 mb-0">{{ $tutor->name }} {{ $tutor->surname }}</h1>
                <p class="h5 mb-1">{{ $tutor->role_id }}</p> <!-- TODO que ponga si es tutor academico, de empresa o coordinador -->
                <p class="mb-0">{{ $tutor->email }}</p>
                <p class="mb-0">{{ $tutor->phone }}</p>  
            </div>
            
            <!-- Boton Editar -->
            <a href="#" class="d-inline-block btn btn-sm btn-secondary shadow-sm text-primary">
                Editar <!-- TODO añadir enlace -->
            </a>

        </div>
        <!-- End Box -->
    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row mb-2">

        <!-- Info Grado -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Alumnos</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                </div>
            </div>
        </div>
        <!-- End Info Grado -->

        <!-- TODO Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">
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

                <!-- Empresa -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <div class="form-group">
                        <select class="form-select" name="company">
                            <option value="" @selected(!$old_company)>Empresa</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @selected($old_company == $company->id)>{{ $company->name }}</option>
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

        <!-- Table -->
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
                    <!-- TODO cargar tabla con los alumnos del tutor en concreto -->
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->dni}}</td>
                            <td>{{$student->fullName()}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>

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

            <!-- TODO Paginacion -->
            <div>
                {{ $students->links() }}
            </div>
            <!-- End Paginacion -->

        </div>
        <!-- End Table -->

    </div>
    <!-- End Row -->


    <a href="{{ route('tutors.index') }}">Volver</a>



@endsection