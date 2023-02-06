<!-- Breadcrumbs -->
{{ Breadcrumbs::render('dashboard') }}

<!-- Titulo -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Panel de control</h1>
</div>

<!-- Row -->
<div class="row">

    <!-- Alumnos -->
    <a href="{{ route('students.index') }}" class="col-xl-3 col-md-6 mb-4">
        <div class="card text-center text-primary shadow h-100 py-2">
            <div class="card-body">
                <h2>
                    <i class="bi bi-mortarboard"></i>
                </h2>
                <div class="row no-gutters align-items-center">
                    <div class="col auto">
                        <h5>Alumnos</h5>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Tutores -->
    <a href="{{ route('tutors.index')}}" class="col-xl-3 col-md-6 mb-4">
        <div class="card text-center text-primary shadow h-100 py-2">
            <div class="card-body">
                <h2>
                    <i class="bi bi-person"></i>
                </h2>
                <div class="row no-gutters align-items-center">
                    <div class="col auto">
                        <h5>Tutores</h5>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Coordinadores -->
    <a href="{{ route('coordinators.index') }}" class="col-xl-3 col-md-6 mb-4">
        <div class="card text-center text-primary shadow h-100 py-2">
            <div class="card-body">
                <h2>
                    <i class="bi bi-people"></i>
                </h2>
                <div class="row no-gutters align-items-center">
                    <div class="col auto">
                        <h5>Coordinadores</h5>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Empresas -->
    <a href="{{ route('companies.index') }}" class="col-xl-3 col-md-6 mb-4">
        <div class="card text-center text-primary shadow h-100 py-2">
            <div class="card-body">
                <h2>
                    <i class="bi bi-buildings"></i>
                </h2>
                <div class="row no-gutters align-items-center">
                    <div class="col auto">
                        <h5>Empresas</h5>
                    </div>
                </div>
            </div>
        </div>
    </a>

</div>
<!-- End Row -->

<!-- Row -->
<div class="row">

    <!-- Grados -->
    <a href="{{ route('grades.index') }}" class="col-xl-3 col-md-6 mb-4">
        <div class="card text-center text-primary shadow h-100 py-2">
            <div class="card-body">
                <h2>
                    <i class="bi bi-bank"></i>
                </h2>
                <div class="row no-gutters align-items-center">
                    <div class="col auto">
                        <h5>Grados</h5>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Estadísticas -->
    <a href="{{ route('charts')}}" class="col-xl-3 col-md-6 mb-4">
        <div class="card text-center text-primary shadow h-100 py-2">
            <div class="card-body">
                <h2>
                    <i class="bi bi-bar-chart"></i>
                </h2>
                <div class="row no-gutters align-items-center">
                    <div class="col auto">
                        <h5>Estadísticas</h5>
                    </div>
                </div>
            </div>
        </div>
    </a>

</div>

<div class="row">

    <!-- Chart -->
    <div class="col-xl-8 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <linechart-component></linechart-component>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body d-flex align-items-center">
                <piechart-component></piechart-component>
            </div>
        </div>
    </div>

</div>
