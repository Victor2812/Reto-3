@extends('layouts.app')

@section('title', 'Nuevo Alumno')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('students.create') }}

<div class="row bg-white shadow mx-2 gx-0">

     <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <h1 class="h3 mb-0">Añadir Alumno</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Formulario -->
    <div class="row px-4 gx-sm-3 gx-0">
        <form action="{{ route('students.store') }}" class="requires-validation" method="POST">
            @csrf
            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Nombre -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('cif')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                    </div>
                </div>

                <!-- DNI -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="dni" placeholder="DNI">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Grado -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="grado">
                        <option selected>Grado</option>
                        @foreach($grades as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <!-- Curso -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="curso"><!-- TODO cargar curso académico -->
                        <option selected>Curso</option>
                        </select>
                    </div>
                </div>

                <!-- Año Academico -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="anio-academico">
                        <option selected>Año academico</option>
                        @foreach($schoolYears as $year)
                            <option value="{{ $year->id }}">{{ $year->toText() }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Tutor Academico -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="tutor-academico">
                        <option selected>Tutor Académico</option>
                        @foreach($academicTutors as $academic)
                            <option value="{{ $academic->id }}">{{ $academic->fullName() }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <!-- Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="empresa">
                        <option selected>Empresa</option>
                        @foreach($empresa as $e)
                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <!-- Tutor Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="tutor-empresa">
                        <option selected>Tutor Empresa</option>
                        @foreach($companyTutors as $company)
                            <option value="{{ $company->id }}">{{ $company->fullName() }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Mail -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('cif')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="email" class="form-control" name="mail" placeholder="Mail">
                    </div>
                </div>

                <!-- Password -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                    </div>
                </div>

                <!-- Telefono -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
                    </div>
                </div>


            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Añadir Alumno</button>
                </div>

            </div>
            <!-- End Row -->
        </form>
    </div>
    <!-- End Formulario -->

</div>


@endsection
