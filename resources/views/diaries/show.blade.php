@extends('layouts.app')

@section('title', "Diario | $student->name $student->surname")

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
            <h1 class="h3 mb-0 px-4">Diario</h1>
        </div>
        <!-- End Titulo -->

        <div class="row px-4 my-3">
            <!-- Entrada Diario -->
            <div class="row mb-0 mb-md-4">
                <!-- Actividades Desarrolladas -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Actividades desarrolladas</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Vivamus sodales lorem nec risus pharetra ullamcorper. 
                        Nunc vulputate ut sapien ut gravida. Sed lacinia urna ac efficitur pretium. 
                        Donec quis rhoncus tortor. Phasellus eget lectus quis ipsum dapibus euismod. 
                        Pellentesque aliquam, sem in malesuada tincidunt, 
                        mauris lectus consequat turpis, eu lobortis sapien tortor non lectus. 
                        Nam mollis ornare justo. Curabitur ac hendrerit velit.
                    </p>
                </div>

                <!-- Refelxion sobre el aprendizaje -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Reflexión sobre el aprendizaje y progreso realizado en las competencias</h4>
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

                <!-- Observaciones -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Observaciones</h4>
                    <div class="form-group mb-3">
                        <textarea class="form-control" rows="6" placeholder="Observaciones"></textarea>
                    </div>
                </div>

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Editar Observacion</button>
                </div>
        </div>

    </div>
    <!-- End Entrada Diario -->

</div>
</div>
@endsection
