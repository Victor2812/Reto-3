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

<div>
    <!-- Header Usuario -->
    <a href="" class="mr-2 d-none d-lg-inline text-gray-600 small">
        {{ Auth::user()->person()->first()->fullName() }}
    </a>

    <!-- Header Logout -->
    <a href="{{ route('logout') }}" class="text-gray-600 small">
        Cerrar Sesión
    </a>
</div>