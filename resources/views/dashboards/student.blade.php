<!-- Breadcrumbs -->
{{ Breadcrumbs::render('dashboard') }}

<!-- Content -->
<div class="content-fluid">

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0 rounded mb-3">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white rounded">
                <div>
                    <h1 class="h3 mb-3">Nombre</h1>
                    <p class="mb-0">mail@example.com</p>
                    <p class="mb-0">666 666 666</p>
                </div>
                <div>
                    <a href="">
                        <button class="btn btn-secondary text-primary">
                            Editar
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Ficha Dual -->
        <div class="row px-4 gx-0 my-3">

            <!-- Titulo -->
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 px-4">Ficha Dual</h1>
            </div>
            <!-- End Titulo -->

            <!-- Data -->
            <div class="row px-4 gx-0 my-3">

                <div class="col-12">
                    <ul class="list-group list-group-light">
                        <li class="list-group-item"><strong>TUTOR </strong>Rita La Pollera</li>
                        <li class="list-group-item"><strong>EMPRESA </strong>Carnicería Julian</li>
                        <li class="list-group-item"><strong>TUTOR EMPRESA </strong>Jack el Desguazador</li>
                        <li class="list-group-item"><strong>AÑO ACADÉMICO </strong> 2021-2022</li>
                        <li class="list-group-item"><strong>CURSO </strong>2</li>
                    </ul>
                </div>

            </div>
            <!-- End Data -->

            <!-- Botones -->
            <div class="row px-4 my-3 gx-0 gx-sm-3">

                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                    <a href="" class="btn-guapo btn-outline-primary">
                        Diario de Aprendizaje
                    </a>
                </div>

                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                    <a href="" class="btn-guapo btn-outline-primary">
                        Diario Segumiento
                    </a>
                </div>

                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                    <a href="" class="btn-guapo btn-outline-primary">
                        Evaluación Diario
                    </a>
                </div>

                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                    <a href="" class="btn-guapo btn-outline-primary">
                        Evaluación Empresa
                    </a>
                </div>

            </div>
            <!-- End Botones -->

        </div>
        <!-- End Ficha Dual -->

    </div>

    <div class="row bg-white shadow mx-2 gx-0 rounded">
        <!-- Historial -->
        <div class="row px-4 pt-4 gx-0 mb-3">

            <!-- Titulo -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0">Historial</h1>
            </div>
            <!-- End Titulo -->

            <!-- Tabla -->
            <div class="table-responsive-sm">
                <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Año escolar</th>
                            <th class="d-none d-sm-table-cell">Tutor</th>
                            <th class="d-none d-sm-table-cell">Compañía</th>
                            <th class="d-none d-sm-table-cell">Curso</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- End Tabla -->
        </div>
        <!-- End Historial -->
    </div>


</div>
<!-- End Content -->






