@extends('layouts.app')

@section('title', "Empresa | $company->name")

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('companies.edit', $company) }}

    <!-- Row -->
    <div class="row bg-white shadow mc-3 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-start">
                <h1 class="h3 mb-0">Editar Empresa</h1>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Row -->
        <div class="row">
            <form action="{{ route('companies.update', [$company->id]) }}" class="requires-validation" method="POST">
                @method('PUT')
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
                                <input type="text" class="form-control" name="cif" placeholder="CIF" value="{{ $company->CIF }}">
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                            @error('name')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <div class="form-outline">
                                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $company->name }}">
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
                                <input type="text" class="form-control" name="location" placeholder="Direcci??n" value="{{ $company->location }}">
                            </div>
                        </div>

                        <!-- Grado -->
                        <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                            <div class="form-group">

                                <select class="form-select" name="tutor">
                                    <option value="">Tutor</option>
                                    @foreach ($tutors as $tutor)
                                        <option value="{{ $tutor->id }}" @selected($tutor->id == $company->person_id)>{{$tutor->fullName()}}</option>
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
                            <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
                        </div>

                    </div>
                    <!-- End Row -->

                </div>
            </form>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Row -->

@endsection
