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





