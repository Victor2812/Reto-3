@extends('layouts.app')

@section('title', 'Charts')

@section('main')

<!-- Breadcrumbs -->


<div class="row bg-white shadow mx-2 gx-0">

    <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0">Estadísticas</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Charts -->
    <div class="row">

        <!-- Pie Chart -->
        <div class="col-6">
            <piechart-component></piechart-component>
        </div>

        <!-- Linear Chart -->
        <div class="col-6">
            <linechart-component></linechart-component>
        </div>
    </div>
    <!-- End Charts -->

</div>


@endsection
