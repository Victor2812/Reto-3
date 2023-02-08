@extends('layouts.app')

@section('title', 'Editar Alumno')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('students.edit', $student) }}

<div class="row bg-white shadow mx-2 gx-0">
     <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <h1 class="h3 mb-0">Editar Alumno</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Formulario -->
    <div class="row px-4 gx-sm-3 gx-0">
        <form action="{{ route('students.update', [$student->id]) }}" class="requires-validation" method="POST">
            @csrf
            @method('PUT')
            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Nombre -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $student->name }}">
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('surname')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="surname" placeholder="Apellidos" value="{{ $student->surname }}">
                    </div>
                </div>

                <!-- DNI -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('dni')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="dni" placeholder="DNI" value="{{ $student->dni }}">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Mail -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('email')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="email" class="form-control" name="email" placeholder="Mail" value="{{ $student->email }}">
                    </div>
                </div>

                <!-- Password -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('pass')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                    </div>
                </div>

                <!-- Telefono -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('phone')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="phone" placeholder="Teléfono" value="{{ $student->phone }}">
                    </div>
                </div>


            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Editar Alumno</button>
                </div>

            </div>
            <!-- End Row -->
        </form>
    </div>
    <!-- End Formulario -->

</div>
@endsection