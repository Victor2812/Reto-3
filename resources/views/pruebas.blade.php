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
            <div class="content">
                <div class="header bg-white mb-4 static-top shadow p-4">
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

                    <!-- Header Usuario -->
                    <a href="" class="mr-2 d-none d-lg-inline text-gray-600 small">
                        Douglas McGee
                    </a>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">|</span>

                    <!-- Header Logout -->
                    <a href="" class="text-gray-600 small">
                        Cerrar Sesión
                    </a>

                </div>
            </div>
            <!-- End Header -->

            <!-- Main -->
            <div class="content-fluid">

                @yield('main')

            </div>
            <!-- End Main -->

            <!-- Footer -->
            <footer class="bg-white">
                <div class="container my-auto p-4">

                    <!-- Footer Nav -->
                    <nav class="navbar navbar-expand-sm">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item px-sm-1">
                                <a href="#">Politica</a>
                            </li>
                            <li class="nav-item px-sm-1">
                                <a href="#">Mierda</a>
                            </li>
                            <li class="nav-item px-sm-1">
                                <a href="#">Coño</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Footer Nav -->

                    <!-- Footer Social -->
                    <!-- End Footer Social-->

                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End Content Wrapper -->
    </div>
    <!-- End Wrapper -->
</body>
</html>





