@extends('layouts.app')

@section('title', 'Charts')

@section('main')

<!-- Titulo -->
<div class="d-flex align-items-center justify-content-between mb-4 px-4">
    <h1 class="h3 mb-0">Estadísticas</h1>
</div>
<!-- End Titulo -->

<!-- Chart -->
<canvas id="pieChart"></canvas>
<!-- End Chart -->

<a href="{{ route('dashboard')}}">Volver</a>

@endsection
