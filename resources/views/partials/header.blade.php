<!-- Header Logo -->
<a href="{{ route('dashboard') }}">
    <img src="/imgs/universidad-deusto.svg" alt="Universidad de Deusto" width="150px">
</a>

<!-- Header Buscador -->
<!--
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
-->

<div class="d-flex flex-row align-items-center justify-content-center header-guapo">
    <!-- Header Usuario -->
    @if (Auth::user()->isCoordinator())
        <a href="{{ route('coordinators.show', [Auth::user()->person()->first()->id]) }}" class="mr-2 d-none d-lg-inline text-decoration-none small">
            {{ Auth::user()->person()->first()->fullName() }}
        </a>
    @elseif (Auth::user()->isTutor())
        <a href="{{ route('tutors.show', [Auth::user()->person()->first()->id]) }}" class="mr-2 d-none d-lg-inline text-decoration-none small">
            {{ Auth::user()->person()->first()->fullName() }}
        </a>
    @else
        <a href="{{ route('students.show', [Auth::user()->person()->first()->id]) }}" class="mr-2 d-none d-lg-inline text-decoration-none small">
            {{ Auth::user()->person()->first()->fullName() }}
        </a>
    @endif
    <div class="divider d-none d-lg-inline"></div>

    <!-- Header Logout -->
    <a href="{{ route('logout') }}" class="text-decoration-none small">
        Cerrar Sesión
    </a>
</div>