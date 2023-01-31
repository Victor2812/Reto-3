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
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div id="app" class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary"></div>
            <div class="col py-3" >
                <div class="col py-3 d-flex flex-column ">

                    <!-- Header -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">
    
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
    
                        <!-- Header Logo -->
                        <a href="{{ route('dashboard') }}">
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
                        <a href="#" class="mr-2 d-none d-lg-inline text-gray-600 small">
                            {{ Auth::user()->person()->first()->fullName() }}
                        </a>
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">|</span>
    
                        <!-- Header Logout -->
                        <a href="{{ route('logout') }}" class="text-gray-600 small">
                            Cerrar Sesión
                        </a>
                        
                    </nav>
                    <!-- End Header -->

                    <!-- Main -->

                        @yield('main')

                    <!-- End Main -->
                </div>
            </div>
        </div>
        <footer-sufrimiento></footer-sufrimiento>
    </div>
</body>
</html>

