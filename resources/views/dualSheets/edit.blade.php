@extends('layouts.app')

@section('title', 'Editar Ficha Dual')

@section('main')

<!-- Breadcrumbs -->


<div class="row bg-white shadow mx-2 gx-0">

     <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <h1 class="h3 mb-0">Editar Ficha Dual</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Formulario -->
    <div class="row px-4 gx-sm-3 gx-0">
        <form action="{{ route('dualSheets.update', [$sheet->id]) }}" class="requires-validation" method="POST">
            @csrf
            @method('PUT')

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
                            @foreach ($students as $st)
                                <option value="{{ $st->id }}" @selected($st->id == $student->id)>{{ $st->fullName() }}</option>
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
                                <option value="{{ $tutor->id }}" @selected($tutor->id == $sheet->tutor_id)>{{ $tutor->fullName() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('company')
                        <strong>{{ $message }}</strong>    
                    @enderror
                    <div class="form-group">
                        <select class="form-select" name="company">
                            <option value="">Empresa</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @selected($company->id == $sheet->company_id)>{{ $company->name }}</option>
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
                        @error('year')
                            <strong>{{ $message }}</strong>    
                        @enderror
                        <select class="form-select" name="year">
                            <option value="">Año Académico</option>
                            @foreach ($schoolYears as $year)
                                <option value="{{ $year->id }}" @selected($year->id == $sheet->school_year_id)>{{ $year->toText() }}</option>
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
                                <option value="{{ $course->id }}" @selected($course->id == $sheet->course_id)>{{ $course->toText() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Checkboxes -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">
                    <!-- Titulados -->
                    <div class="form-check d-flex justify-content-center align-items-center">
                        <input class="form-check-input" type="checkbox" value="1" name="graduated" id="graduated">
                        <label class="form-check-label px-2 mt-1" for="graduated">
                            Titulados
                        </label>
                    </div>

                    <!-- No Activos -->
                    <div class="form-check d-flex justify-content-center align-items-center">
                        <input class="form-check-input" type="checkbox" value="1" name="notactive" id="notactive">
                        <label class="form-check-label px-2 mt-1" for="notactive">
                            No Activos
                        </label>
                    </div>

                </div>
                <!-- End Checkboxes -->

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Actualizar Ficha Dual</button>
                </div>

            </div>
            <!-- End Row -->
        </form>
    </div>
    <!-- End Formulario -->

</div>


@endsection