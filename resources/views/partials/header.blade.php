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

<div class="d-flex flex-row align-items-center justify-content-center">
    <!-- Header Usuario -->
    <a href="" class="mr-2 d-none d-lg-inline text-decoration-none small">
        {{ Auth::user()->person()->first()->fullName() }}
    </a>

    <div class="divider d-none d-lg-inline"></div>

    <!-- Header Logout -->
    <a href="{{ route('logout') }}" class="text-decoration-none small">
        Cerrar Sesión
    </a>
</div>