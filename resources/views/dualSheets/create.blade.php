@extends('layouts.app')

@section('title', 'Nueva Ficha Dual')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('dualSheets.create') }}

<div class="row bg-white shadow mx-2 gx-0">

     <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <h1 class="h3 mb-0">Añadir Ficha Dual</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Formulario -->
    <div class="row px-4 gx-sm-3 gx-0">
        <form action="{{ route('dualSheets.store') }}" class="requires-validation" method="POST">
            @csrf

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Alumno -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        @error('student')
                            <strong>{{ $message }}</strong>    
                        @enderror
                        <select class="form-select" name="student">
                            <option value="">Alumno</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->fullName() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Tutor Académico -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        @error('tutor')
                            <strong>{{ $message }}</strong>    
                        @enderror
                        <select class="form-select" name="tutor">
                            <option value="">Tutor Académico</option>
                            @foreach ($tutors as $tutor)
                                <option value="{{ $tutor->id }}">{{ $tutor->fullName() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        @error('company')
                            <strong>{{ $message }}</strong>    
                        @enderror
                        <select class="form-select" name="company">
                            <option value="">Empresa</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Año académico -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        @error('year')
                            <strong>{{ $message }}</strong>    
                        @enderror
                        <select class="form-select" name="year">
                            <option value="">Año Académico</option>
                            @foreach ($schoolYears as $year)
                                <option value="{{ $year->id }}">{{ $year->toText() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Curso -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        @error('course')
                            <strong>{{ $message }}</strong>    
                        @enderror
                        <select class="form-select" name="course">
                            <option value="">Curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->toText() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Añadir Ficha Dual</button>
                </div>

            </div>
            <!-- End Row -->
        </form>
    </div>
    <!-- End Formulario -->

</div>


@endsection

