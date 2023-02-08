<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

    <!-- Lista Nav -->
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start my-5" id="menu">

        <!-- Home -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0 text-white">
                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
            </a>
        </li>

        <!-- Alumnos -->
        <li class="nav-item">
            <a href="{{ route('students.index') }}" class="nav-link align-middle px-0 text-white">
                <i class="fs-4 bi-mortarboard"></i> <span class="ms-1 d-none d-sm-inline">Alumnos</span></a>
        </li>

        <!-- Tutores -->
        <li class="nav-item">
            <a href="{{ route('tutors.index') }}" class="nav-link align-middle px-0 text-white">
                <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Tutores</span>
            </a>
        </li>

        <!-- Coordinadores -->
        <li class="nav-item">
            <a href="{{ route('coordinators.index') }}" class="nav-link align-middle px-0 text-white">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Coordinadores</span>
            </a>
        </li>

        <!-- Empresas -->
        <li class="nav-item">
            <a href="{{ route('companies.index') }}" class="nav-link align-middle px-0 text-white">
            <i class="fs-4 bi-buildings"></i> <span class="ms-1 d-none d-sm-inline">Empresas</span>
            </a>
        </li>

        <!-- Grados -->
        <li class="nav-item">
            <a href="{{ route('grades.index') }}" class="nav-link align-middle px-0 text-white">
                <i class="fs-4 bi-bank"></i> <span class="ms-1 d-none d-sm-inline">Grados</span>
            </a>
        </li>

        <!-- Fichas Duales -->
        <li class="nav-item">
            <a href="{{ route('dualSheets.index') }}" class="nav-link align-middle px-0 text-white">
                <i class="fs-4 bi-file-earmark-spreadsheet"></i> <span class="ms-1 d-none d-sm-inline">Fichas Duales</span>
            </a>
        </li>

        <!-- Estadisticas -->
        <li class="nav-item">
            <a href="{{ route('charts') }}" class="nav-link align-middle px-0 text-white">
                <i class="fs-4 bi-bar-chart"></i> <span class="ms-1 d-none d-sm-inline">Estadísticas</span>
            </a>
        </li>

    </ul>
    <!-- End Lista Nav -->

</div>
