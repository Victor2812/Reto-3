@extends('layouts.app')

@section('title', 'Charts')

@section('main')

<!-- Titulo -->
<div class="d-flex align-items-center justify-content-between mb-4 px-4">
    <h1 class="h3 mb-0">Estadísticas</h1>
</div>
<!-- End Titulo -->

<!-- Chart -->
<div class="row">
    <div class="col-6">
        <canvas id="pieChart"></canvas>
    </div>
    <div class="col-6">
        <canvas id="lineChart"></canvas>
    </div>
</div>
<!-- End Chart -->

<a href="{{ route('dashboard')}}">Volver</a>

@endsection
