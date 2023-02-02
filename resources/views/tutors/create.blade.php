@extends('layouts.app')

@section('title', 'Tutor')

@section('main')

<div class="d-flex align-items-center justify-content-between mb-4 px-4">
    <h1 class="h3 mb-0">Añadir Tutor</h1>
</div>

<div class="row">
    <form action="{{ route('tutors.store') }}" class="requires-validation" novalidate>
        <div class="form-body">

            <!-- Row -->
            <div class="row mb-4">

                <!-- Nombre -->
                <div class="col-4">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="col-4">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                    </div>
                </div>

                <!-- DNI -->
                <div class="col-4">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="dni" placeholder="DNI">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-4">

                <!-- Tipo de Tutor -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="tipoTutor">Tipo de Tutor</label>
                        <select class="form-control" name="tipoTutor">
                            <option>Academico</option>
                            <option>Empresa</option>
                        </select>
                    </div>
                </div>

                <!-- Grado -->
                <div class="col-6">
                    <div class="form-group">

                        <select class="form-control" name="grado">
                            <option>Dessarrollo de mierda</option>
                            <option>Dessarrollo de detritos</option>
                            <option>Dessarrollo de excreciones</option>
                            <option>Dessarrollo de heces</option>
                            <option>Dessarrollo de boñigas</option>
                        </select>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-4">

                <!-- Mail -->
                <div class="col-4">
                    <div class="form-outline">
                        <input type="mail" class="form-control" name="email" placeholder="Mail">
                    </div>
                </div>

                <!-- Password -->
                <div class="col-4">
                    <div class="form-outline">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                    </div>
                </div>

                <!-- Password -->
                <div class="col-4">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="pass" placeholder="Teléfono">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>


        </div>
    </form>
</div>

<a href="{{ route('tutors.index')}}">Volver</a>

@endsection
