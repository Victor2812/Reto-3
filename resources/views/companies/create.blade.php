@extends('layouts.app')

@section('title', 'Empresa')

@section('main')

<!-- Titulo -->
<div class="d-flex align-items-center justify-content-between mb-4 px-4">
    <h1 class="h3 mb-0">Añadir Empresa</h1>
</div>
<!-- End Titulo -->

<!-- Row -->
<div class="row">
    <form action="{{ route('companies.store') }}" class="requires-validation" method="POST">
        @csrf
        <div class="form-body">

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- CIF -->
                <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                    @error('cif')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="cif" placeholder="CIF">
                    </div>
                </div>

                <!-- Nombre -->
                <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="name" placeholder="Nombre">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Direccion -->
                <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                    @error('location')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="location" placeholder="Dirección">
                    </div>
                </div>

                <!-- Grado -->
                <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                    <div class="form-group">

                        <select class="form-select" name="tutor">
                            <option value="" selected>Tutor</option>
                            @foreach ($tutors as $tutor)
                                <option value="{{ $tutor->id }}">{{$tutor->fullName()}}</option>
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
                    <button type="submit" class="btn btn-primary">Añadir Empresa</button>
                </div>

            </div>
            <!-- End Row -->

        </div>
    </form>
</div>
<!-- End Row -->

<a href="{{ route('companies.index')}}">Volver</a>

@endsection
