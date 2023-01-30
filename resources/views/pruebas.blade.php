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

                    <ul class="navbar-nav ml-auto">

                        <!-- Header Usuario -->
                        <li class="nav-item">
                            <a href="" class="mr-2 d-none d-lg-inline text-gray-600 small">
                                Douglas McGee
                            </a>
                        </li>

                        <div class="divider"></div>

                        <!-- Header Logout -->
                        <li class="nav-item">
                            <a href="" class="text-gray-600 small">
                                Cerrar Sesión
                            </a>
                        </li>

                    </ul>

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
                <div class="container p-3 pb-0 d-flex flex-row justify-content-between">

                    <!-- Footer Nav -->
                    <nav class="navbar navbar-expand-sm navbar-ligh mb-3">
                            <a class="px-2" href="">
                                caca
                            </a>
                            <a class="px-2" href="">
                                culo
                            </a>
                            <a class="px-2" href="">
                                pedo
                            </a>
                            <a class="px-2" href="">
                                pis
                            </a>
                    </nav>
                    <!-- End Footer Nav -->

                    <!-- Footer Social -->
                    <nav class="navbar navbar-expand-sm navbar-ligh mb-3">
                            <a class="px-2" href="">
                                caca
                            </a>
                            <a class="px-2" href="">
                                culo
                            </a>
                            <a class="px-2" href="">
                                pedo
                            </a>
                            <a class="px-2" href="">
                                pis
                            </a>
                    </nav>
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





