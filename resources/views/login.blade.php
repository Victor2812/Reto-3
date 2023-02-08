@extends('layouts.base')

@section('title', 'Login')

@section('body')
    <section class="vh-100 animacion">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow">
                        <div class="p-5 text-center">
                            <img class="mb-5 mt-2" src="imgs/universidad-deusto.svg" alt="logo universidad deusto" width="70%">
                            <!--
                            <form action="">
                                <login-sufrimiento></login-sufrimiento>
                            </form>
                                -->
                            <form method="post" action="{{ route('login') }}">
                                @csrf

                                <div class="form-outline mb-4">
                                    <input type="text" name="dni" class="form-control form-control-lg" placeholder="DNI" />
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                                </div>
                                <button class="btn-guapo btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection