@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Panel de control</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-mortarboard"></i> <span class="ms-1 d-none d-sm-inline">Alumnos</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-white">
                        <i class="fs-4 bi-buildings"></i> <span class="ms-1 d-none d-sm-inline">Empresas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Tutores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Coordinadores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-bank"></i> <span class="ms-1 d-none d-sm-inline">Grados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-bar-chart"></i> <span class="ms-1 d-none d-sm-inline">Estadísticas</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col py-3">
            <header class="d-flex bg-light">
                <a href="#">
                    <img src="imgs/universidad-deusto.svg" alt="Universidad de Deusto" width="150px">
                </a>
                <div class="input-group">
                    <div class="form-outline">
                        <input id="search-input" type="search" id="form1" class="form-control" />
                    </div>
                    <button id="search-button" type="button" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error, rem delectus, ad expedita
                        molestias, inventore voluptas vitae facilis ea eaque ratione a unde tenetur minus laboriosam
                        excepturi illum vero vel?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

