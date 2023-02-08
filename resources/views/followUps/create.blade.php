@extends('layouts.app')

@section('title', "Nuevo Seguimiento | ")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Evaluación -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Nuevo Seguimiento</h1>
        </div>
        <!-- End Titulo -->

        <!-- Formulario -->
        <div class="row px-4  my-3">
            <form action="{{ route('dualSheets.followUps.store', [$sheet->id]) }}" class="requires-validation" method="POST">
                @csrf

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Fecha -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-outline">
                            <label for="fecha" class="h5">Fecha de la reunión</label>
                            @error('date')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Asistentes -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-group">
                            @error('assistants')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="assistants">
                                <option value="">Asistentes</option>
                                @foreach($assistants as $id => $value)
                                    <option value="{{$id}}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tipo de Tutoria -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-group">
                            @error('type')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="type">
                                <option value="">Tipo de Tutoría</option>
                                @foreach ($types as $id => $value)
                                    <option value="{{ $id }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Objetivos -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Objetivos</h5>
                        <div class="form-group">
                            @error('objetives')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="6" placeholder="Escribe aquí" name="objetives"></textarea>
                        </div>
                    </div>

                    <!-- Aspectos comentados -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Aspectos comentados</h5>
                        <div class="form-group">
                            @error('commented_issues')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="6" placeholder="Escribe aquí" name="commented_issues"></textarea>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Actualizar Seguimiento</button>
                </div>

        </div>
        <!-- Formulario -->

    </div>
    <!-- End Evaluación -->

</div>
@endsection
