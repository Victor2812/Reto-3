<!-- Breadcrumbs -->
{{ Breadcrumbs::render('dashboard') }}

<!-- Content -->
<div class="content-fluid">

    <!-- Row -->
	<div class="row mb-4">

        <!-- Cabecera -->
		<div class="col-md-12">
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white rounded shadow">
                <div>
                    <h1 class="h3 mb-0">Nombre Apellidos</h1> <!-- TODO meter nombre y apellidos -->
                    <p class="text-uppercase">grado que esta cursando</p> <!-- TODO meter grado -->
                    <p class="mb-0">mail@example.com</p> <!-- TODO meter mail -->
                    <p class="mb-0">telefono</p> <!-- TODO meter telefono -->
                </div>
                <div>
                    <a href="#"><button class="btn btn-secondary text-primary">Editar</button></a> <!-- TODO meter enlace -->
                </div>
            </div>
		</div>
	</div>
    <!-- End Row -->

    <!-- Row -->
	<div class="row mb-4">

        <!-- Data -->
        <div class="col-12">

            <div class="bg-white shadow p-4 d-flex flex-column flex-sm-row rounded">

                <!-- Curso -->
                <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Curso</p>
                    <p class="mb-0">2</p>
                </div>

                <!-- Tutor -->
                <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Tutor Académico</p>
                    <p class="mb-0">Rita La Pollera</p>
                </div>

                <!-- Empresa -->
                <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Empresa</p>
                    <p class="mb-0">Funeraria Albia</p>
                </div>

                <!-- Tutor empresa -->
                <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Tutor Empresa</p>
                    <p class="mb-0">Doctor Muerte</p>
                </div>

                <!-- Diario -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <button class="btn-guapo btn-outline-primary">Diario</button>
                </div>

                <!-- Evaluacion -->
                <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <button class="btn-guapo btn-outline-primary">Evaluación</button>
                </div>
            </div>

        </div>
        <!-- End Data -->

	</div>
    <!-- End Row -->

    <!-- Row -->
	<div class="row">

        <!-- Historial -->
		<div class="col-md-12">
            <div class="bg-white shadow p-4 rounded">

                <!-- Titulo -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0">Historial</h1>
                    <div class="d-flex flex-row">
                        <div class="form-group">
                            <select class="form-select" name="año academico">
                                <option value="" selected>2021-2022</option> <!-- TODO cargar años academicos -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>

                </div>
                <!-- End Titulo -->

                <!-- Tabla -->
                <div class="table-responsive-sm">
                    <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Año Academico</th>
                                <th>Diario</th>
                                <th>Evaluación</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- TODO foreach -->
                        <tr>
                            <td>2021-2022</td>
                            <td>
                                <a href="#"> <!-- TODO enlace -->
                                    <button class="btn">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="#"> <!-- TODO enlace -->
                                    <button class="btn">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Tabla -->

            </div>
		</div>
        <!-- End Historial -->

	</div>
    <!-- End Row -->
</div>
<!-- End Content -->






