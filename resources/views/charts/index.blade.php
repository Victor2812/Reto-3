@extends('layouts.app')

@section('title', 'Charts')

@section('main')

<!-- Breadcrumbs -->


<!-- Titulo -->
<div class="d-flex align-items-center justify-content-between mb-4 px-4">
    <h1 class="h3 mb-0">Estadísticas</h1>
</div>
<!-- End Titulo -->

<!-- Chart -->
<div class="row">
    <div class="col-6">
        <piechart-component></piechart-component>
    </div>
    <div class="col-6">
        <linechart-component></linechart-component>
    </div>
</div>
<!-- End Chart -->

<div class="row">
    <a href="{{ route('dashboard') }}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection
