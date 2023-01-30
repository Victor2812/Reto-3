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
    <section class="vh-100 bg-primary">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="p-5 text-center">
                            <img class="mb-5 mt-2" src="imgs/universidad-deusto.svg" alt="logo universidad deusto" width="70%">
                            <!--
                            <form action="" method="POST">
                                <login-sufrimiento></login-sufrimiento>
                            </form>
                            -->
                            
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="form-outline mb-4">
                                    <input type="text"  name="dni" class="form-control form-control-lg mb-4" placeholder="DNI" />
                                </div>
                
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                                </div>
                
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>