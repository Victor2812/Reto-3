@extends('layouts.app')

@section('title', "Editar Tutor")

@section('main')

{{ Breadcrumbs::render('tutors.edit', $tutor) }}

<div class="row bg-white shadow mx-2 gx-0">

    <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <h1 class="h3 mb-0">Editar Tutor</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Formulario -->
    <div class="row px-4 gx-sm-3 px-0">
        <form action="{{ route('tutors.update', [$tutor->id]) }}" class="requires-validation" method="POST">
            @csrf
            @method('PUT')
            <div class="form-body">
    
                <!-- Row -->
                <div class="row mb-0 mb-sm-4">
    
                    <!-- Nombre -->
                    <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="form-outline">
                            <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $tutor->name }}">
                        </div>
                    </div>
    
                    <!-- Apellidos -->
                    <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                        @error('surname')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="form-outline">
                            <input type="text" class="form-control" name="surname" placeholder="Apellidos" value="{{ $tutor->surname }}">
                        </div>
                    </div>
    
                    <!-- DNI -->
                    <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                        @error('dni')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="form-outline">
                            <input type="text" class="form-control" name="dni" placeholder="DNI" value="{{ $tutor->dni }}">
                        </div>
                    </div>
    
                </div>
                <!-- End Row -->
    
                <!-- Row -->
                <div class="row mb-0 mb-sm-4">
    
                    <!-- Tipo de Tutor -->
                    <div class="col-12 mb-6 col-sm-6 mb-sm-0">
                        @error('role')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="form-group">
                            <select class="form-select" name="role">
                                <option value="">Tipo de tutor</option>
                                @foreach ($roles as $key => $value)
                                    <option value="{{ $value }}" @selected($value == $tutor->role_id)>{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <!-- Password -->
                    <div class="col-12 mb-6 col-sm-6 mb-sm-0">
                        @error('pass')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="form-outline">
                            <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                        </div>
                    </div>
    
                </div>
                <!-- End Row -->
    
                <!-- Row -->
                <div class="row mb-0 mb-sm-4">
    
                    <!-- Mail -->
                    <div class="col-12 mb-6 col-sm-6 mb-sm-0">
                        @error('email')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="form-outline">
                            <input type="mail" class="form-control" name="email" placeholder="Mail" value="{{ $tutor->email }}">
                        </div>
                    </div>
    
                    <!-- Teléfono -->
                    <div class="col-12 mb-6 col-sm-6 mb-sm-0">
                        @error('phone')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="form-outline">
                            <input type="text" class="form-control" name="phone" placeholder="Teléfono" value="{{ $tutor->phone }}">
                        </div>
                    </div>
    
                </div>
                <!-- End Row -->
    
                <!-- Row -->
                <div class="row mb-0 mb-sm-4">
    
                    <!-- Submit -->
                    <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                        <button type="submit" class="btn btn-primary">Editar Tutor</button>
                    </div>
    
                </div>
                <!-- End Row -->
    
            </div>
        </form>
    </div>
    <!-- End Formulario -->

</div>

@endsection