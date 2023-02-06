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
	<div class="row">

        <!-- Historial -->
		<div class="col-md-12">
            <div class="bg-white shadow p-4 rounded">

                <!-- Alumnos -->
                <div class="row px-4 gx-0 my-3">

                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0">Alumnos</h1>
                        <div>
                            <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                        </div>
                    </div>

                    <!-- Caja Filtros -->
                    <div class="row mb-0 mt-3 mb-sm-3 mx-2 gx-0">

                        <!-- Filtros -->
                        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">

                            <form action="" method="GET"> <!-- TODO accion -->

                                <!-- Row -->
                                <div class="row mb-0 mb-sm-3 gx-0">

                                    <!-- Buscador -->
                                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" name="search" placeholder="Nombre, DNI..." value=""/> <!-- TODO value -->
                                        </div>
                                    </div>

                                    <!-- Curso -->
                                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
                                        <div class="form-group">
                                            <select name="curso" class="form-select">
                                                <option value="" selected>Curso</option>
                                                <!-- TODO foreach -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Grado -->
                                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
                                        <div class="form-group">
                                            <select name="grade" class="form-select">
                                                <option value="" selected>Grado</option>
                                                <!-- TODO foreach -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Empresa -->
                                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
                                        <div class="form-group">
                                            <select name="company" class="form-select">
                                                <option value="" selected>Empresa</option>
                                                <!-- TODO foreach -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">

                                        <!-- Titulados -->
                                        <div class="form-check d-flex justify-content-center align-items-center">
                                            <input class="form-check-input" type="checkbox" value="" name="titulados">
                                            <label class="form-check-label px-2 mt-1" for="titulados">
                                                Titulados
                                            </label>
                                        </div>

                                        <!-- No Activos -->
                                        <div class="form-check d-flex justify-content-center align-items-center">
                                            <input class="form-check-input" type="checkbox" value="" name="no-activos">
                                            <label class="form-check-label px-2 mt-1" for="no-activos">
                                                No Activos
                                            </label>
                                        </div>

                                    </div>
                                    <!-- End Checkboxes -->

                                    <!-- Submit -->
                                    <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1">
                                        <button class="btn-guapo btn-primary" type="submit">Filtrar</button>
                                    </div>

                                </div>
                                <!-- End Row -->

                            </form>

                        </div>
                        <!-- End Filtros -->

                    </div>
                    <!-- End Caja Filtros -->

                    <div class="table-responsive-sm">
                        <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell">DNI</th>
                                    <th>Nombre</th>
                                    <th class="d-none d-sm-table-cell">Mail</th>
                                    <th class="d-none d-sm-table-cell">Telefono</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- TODO foreach -->
                            </tbody>
                        </table>
                    </div>


                        <!-- Paginacion -->
                        <div>
                            <!-- TODO paginacion -->
                        </div>


                </div>
                <!-- End Alumnos -->

            </div>
		</div>
        <!-- End Historial -->

	</div>
    <!-- End Row -->
</div>
<!-- End Content -->






