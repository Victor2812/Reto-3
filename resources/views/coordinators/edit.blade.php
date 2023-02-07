@extends('layouts.app')

@section('title', 'Editar Coordinador')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('coordinators.edit', $coordinator) }}


    <!-- Row -->
        <div class="row bg-white shadow mx-2 gx-0">
            <!-- Titulo -->
            <div class="row px-4 pt-4 gx-0 mb-3">
                <div class="d-flex align-items-center justify-content-start">
                    <h1 class="h3 mb-0">Editar Coordinador</h1>
                </div>
            </div>
            <!-- End Titulo -->

            <!-- Row -->
            <div class="row">
                <form method="POST" action="{{ route('coordinators.update', [$coordinator->id])}}" class="form-body requires-validation"> <!-- TODO accion -->
                        @method('PUT')
                        @csrf
                        
                        <!-- Row -->
                        <div class="row mb-0 mb-sm-4">

                            <!-- Nombre -->
                            @error('nombre')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ $coordinator->name }}">
                                </div>
                            </div>

                            <!-- Apellidos -->
                            @error('apellidos')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ $coordinator->surname }}">
                                </div>
                            </div>

                            <!-- DNI -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="dni" placeholder="DNI" value="{{ $coordinator->dni }}">
                                </div>
                            </div>

                        </div>
                        <!-- End Row -->

                        <!-- Row -->
                        <div class="row mb-0 mb-sm-4">

                            <!-- Mail -->
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="mail" class="form-control" name="email" placeholder="Mail" value="{{ $coordinator->email }}">
                                </div>
                            </div>

                            <!-- Password -->
                            @error('pass')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                                </div>
                            </div>

                            <!-- Teléfono -->
                            @error('phone')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="phone" placeholder="Teléfono" value="{{ $coordinator->phone }}">
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
                </form>
            </div>
            <!-- End Row -->
        </div>
    <!-- End Row -->

@endsection

