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
        <div class="d-flex flex-column justify-content-start">
            <h1 class="h3 mb-3">Alumnos</h1>
            
        </div>
        <!-- End Info Grado -->

        <!-- TODO Filtros -->

            <!-- Buscador -->

            <!-- Curso -->

            <!-- Grado -->

            <!-- Empresa -->

            <!-- Titulados checkbox -->

            <!-- Activos checkbox seleccionado por default -->

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