@extends('layouts.app')

@section('title', "Alumno | $student->name $student->surname")

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('students.show', $student) }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">
                <div>
                    <h1 class="h3 mb-0">{{ $student->fullName() }}</h1>
                    <p class="text-uppercase">grado que esta cursando</p> <!-- meter grado -->
                    <p class="mb-0">{{ $student->email }}</p>
                    <p class="mb-0">{{ $student->phone }}</p>
                </div>
                <div>
                    <a href="{{ route('students.edit', [$student->id]) }}">
                        <button class="btn btn-secondary text-primary">
                            Editar
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Ficha Dual -->
        <div class="row px-4 gx-0 my-3">

            <!-- Titulo -->
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 px-4">Ficha Dual</h1>
            </div>
            <!-- End Titulo -->

        <div class="row px-4 gx-0 my-3">


            <!-- Ficha Dual -->
            <div>
                            <p>{{ $sheet->schoolYear()->first()->toText() }}</p>
                            <p>{{ $sheet->academicTutor()->first()->fullName() }}</p>
                            <p>{{ $sheet->company()->first()->name }}</p>
                            <p>{{ $sheet->course()->first()->name }}</p>
            </div>
            <!-- End Ficha Dual -->

        </div>
        <!-- End Row -->
    </div>
</div>
@endsection
