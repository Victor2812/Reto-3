<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div id="app" class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary"></div>
        <!-- End Sidebar -->

        <!-- Content -->
        <div class="content-wrapper d-flex flex-column">

            <!-- Header -->
            <header class="bg-white mb-5 static-top shadow p-4 d-flex justify-content-between">
                <!-- Header Logo -->
                <a href="#">
                    <img src="imgs/universidad-deusto.svg" alt="Universidad de Deusto" width="150px">
                </a>

                <!-- Header Buscador -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div>
                    <!-- Header Usuario -->
                    <a href="" class="mr-2 d-none d-lg-inline text-gray-600 small">
                        {{ Auth::user()->person()->first()->fullName() }}
                    </a>

                    <!-- Header Logout -->
                    <a href="" class="text-gray-600 small">
                        Cerrar Sesión
                    </a>
                </div>
            </header>
            <!-- End Header -->

            <!-- Main -->
            <div class="content">

                @yield('main')

            </div>
            <!-- End Main -->

            <!-- Footer -->
            <footer class="bg-white container my-auto p-4 d-flex justify-content-between flex-column flex-md-row">
                <!-- Footer Nav -->
                <nav class="navbar navbar-expand-sm flex-column flex-md-row">
                    <a class="nav-item px-3" href="https://www.deusto.es/es/inicio/contacto">
                        Contacto
                    </a>
                    <a class="nav-item px-3" href="https://auraportal.deusto.es/Visitor.aspx?id=11189&idPortal=0&updformid=false&Language=13">
                        Sugerencias
                    </a>
                    <a class="nav-item px-3" href="https://www.deusto.es/es/inicio/privacidad">
                        Privacidad
                    </a>
                    <a class="nav-item px-3" href="https://www.deusto.es/es/inicio/mapa-web">
                        Mapa Web
                    </a>
                </nav>
                <!-- End Footer Nav -->

                <!-- Footer Social -->
                <nav class="navbar navbar-expand-sm justify-content-center">
                    <a class="nav-item px-3" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a class="nav-item px-3" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a class="nav-item px-3" href="https://www.instagram.com/udeusto/">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a class="nav-item px-3" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Linkedin">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a class="nav-item px-3" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Youtube">
                        <i class="bi bi-youtube"></i>
                    </a>
                </nav>
                <!-- End Footer Social-->
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End Content Wrapper -->
    </div>
    <!-- End Wrapper -->
</body>
</html>





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

