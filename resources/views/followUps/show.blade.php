@extends('layouts.app')

@section('title', "Seguimiento | $student->name $student->surname")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">
            <div>
                <h1 class="h3 mb-3">{{ $student->fullName() }}</h1>
                <p class="mb-0">{{ $student->email }}</p>
                <p class="mb-0">{{ $student->phone }}</p>
            </div>
            <div>
                <a href="{{ route('students.edit', [$student->id]) }}">
                    <button class="btn btn-secondary text-primary">
                        Editar
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Row -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 px-1 px-sm-4">Seguimiento</h1>
            <a href="{{ route('followUps.edit', [$student]) }}" class="px-1 px-sm-4"><button class="btn btn-primary">Editar</button></a>
        </div>
        <!-- End Titulo -->

        <div class="row px-4 my-3">
            <!-- Entrada Diario -->
            <div class="row mb-0 mb-md-4">

                <!-- Data -->
                <div class="mb-4">
                    <ul class="list-group list-group-light">
                        <li class="list-group-item"><strong>FECHA </strong>fecha</li>
                        <li class="list-group-item"><strong>ASISTENTES </strong>asistentes</li>
                        <li class="list-group-item"><strong>TIPO DE TUTORÍA </strong>tipo de tutoria</li>
                    </ul>
                </div>

                <!-- Objetivos -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Objetivos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vivamus sodales lorem nec risus pharetra ullamcorper.
                        Nunc vulputate ut sapien ut gravida. Sed lacinia urna ac efficitur pretium.
                        Donec quis rhoncus tortor.
                    </p>
                </div>

                <!-- ASPECTOS COMENTADOS/DECISIONES TOMADAS/FUTURAS ACCIONES -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Aspectos Comentados / Decisiones Tomadas / Futuras Acciones</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vivamus sodales lorem nec risus pharetra ullamcorper.
                        Nunc vulputate ut sapien ut gravida. Sed lacinia urna ac efficitur pretium.
                        Donec quis rhoncus tortor. Phasellus eget lectus quis ipsum dapibus euismod.
                        Pellentesque aliquam, sem in malesuada tincidunt,
                        mauris lectus consequat turpis, eu lobortis sapien tortor non lectus.
                        Nam mollis ornare justo. Curabitur ac hendrerit velit.
                    </p>
                </div>

                <!-- Identificacion de problemas -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Identificación de problemas o dificultades,acciones de mejora a poner en marcha</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vivamus sodales lorem nec risus pharetra ullamcorper.
                        Nunc vulputate ut sapien ut gravida. Sed lacinia urna ac efficitur pretium.
                        Donec quis rhoncus tortor. Phasellus eget lectus quis ipsum dapibus euismod.
                        Pellentesque aliquam, sem in malesuada tincidunt,
                        mauris lectus consequat turpis, eu lobortis sapien tortor non lectus.
                        Nam mollis ornare justo. Curabitur ac hendrerit velit.
                    </p>
                </div>
        </div>

    </div>
    <!-- End Entrada Diario -->

</div>
</div>
@endsection
