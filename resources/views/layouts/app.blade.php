@extends('layouts.base')

@section('body')
    <div class="wrapper">
        <!-- Sidebar -->
        @if (Auth::user()->isCoordinator())
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary">
                @include('partials.sidebar')
            </div>
        @endif
        <!-- End Sidebar -->

        <!-- Content Wrapper-->
        <div class="content-wrapper d-flex flex-column">

            <!-- Header -->
            <header class="bg-white mb-3 static-top shadow p-4 d-flex justify-content-between">
                @include('partials.header')
            </header>
            <!-- End Header -->

            <!-- Main -->
            <div class="content p-4">

                @yield('main')

            </div>
            <!-- End Main -->

            <!-- Footer -->
            <footer class="bg-white my-auto p-4 d-flex justify-content-between flex-column flex-md-row">
                @include('partials.footer')
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End Content Wrapper -->
    </div>
    <!-- End Wrapper -->
@endsection
