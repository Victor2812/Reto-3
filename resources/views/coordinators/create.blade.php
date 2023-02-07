@extends('layouts.app')

@section('title', 'Nuevo Coordinador')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('coordinators.create') }}


    <!-- Row -->
        <div class="row bg-white shadow mx-2 gx-0">
            <!-- Titulo -->
            <div class="row px-4 pt-4 gx-0 mb-3">
                <div class="d-flex align-items-center justify-content-start">
                    <h1 class="h3 mb-0">Añadir Coordinador</h1>
                </div>
            </div>
            <!-- End Titulo -->

            <!-- Row -->
            <div class="row">
                <form action="{{ route('coordinators.store') }}" class="requires-validation" novalidate method="post"> <!-- TODO accion -->
                    <div class="form-body">
                        @csrf 
                        <!-- Row -->
                        <div class="row mb-0 mb-sm-4">

                            <!-- Nombre -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                                </div>
                            </div>
                            @error('nombre')
                                <strong>{{ $message }}</strong>
                            @enderror

                            <!-- Apellidos -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                                </div>
                            </div>
                            @error('apellidos')
                                <strong>{{ $message }}</strong>
                            @enderror

                            <!-- DNI -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="dni" placeholder="DNI">
                                </div>
                            </div>
                            @error('dni')
                                <strong>{{ $message }}</strong>
                            @enderror

                        </div>
                        <!-- End Row -->

                        <!--
                        
                        <div class="row mb-0 mb-sm-4">

                            Grado
                            <div class="col-12 mb-4 mb-sm-0">
                                <div class="form-group">

                                    <select class="form-select" name="grado">
                                        <option selected>Grado</option>
                                        TODO cargar select 
                                    </select>
                                </div>
                            </div>

                        </div>
                        -->

                        <!-- Row -->
                        <div class="row mb-0 mb-sm-4">

                            <!-- Mail -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="mail" class="form-control" name="email" placeholder="Mail">
                                </div>
                            </div>
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror

                            <!-- Password -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                                </div>
                            </div>
                            @error('pass')
                                <strong>{{ $message }}</strong>
                            @enderror

                            <!-- Teléfono -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                                </div>
                            </div>
                            @error('phone')
                                <strong>{{ $message }}</strong>
                            @enderror

                        </div>
                        <!-- End Row -->

                        <!-- Row -->
                        <div class="row mb-0 mb-sm-4">

                            <!-- Submit -->
                            <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                                <button type="submit" class="btn btn-primary">Añadir Coordinador</button>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <!-- End Row -->
        </div>
    <!-- End Row -->

@endsection

