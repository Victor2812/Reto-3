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
                @can('update', $student)
                    <div>
                        <a href="{{ route('students.edit', [$student->id]) }}">
                            <button class="btn btn-secondary text-primary">
                                Editar
                            </button>
                        </a>
                    </div>
                @endcan
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Entradas Diario -->
        <div class="row px-4 gx-0 my-3">

            <!-- Titulo -->
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 px-1 px-sm-5">Entradas Seguimiento</h1>
                <a href="{{ route('dualSheets.followUps.create', [$sheet->id]) }}" class="px-1 px-sm-5"><button class="btn btn-primary">Nueva</button></a>
            </div>
            <!-- End Titulo -->

        <div class="row px-4 gx-0 my-3">
            <div class="table-responsive-sm">
                <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($followUps as $followUp)
                            <tr>
                                <td>{{ $followUp->meeting_date }}</td>

                                <!-- Ver -->
                                <td>
                                    <a class="btn" href="{{ route('dualSheets.followUps.show', [$sheet->id, $followUp->id]) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
    
                                <!-- Editar -->
                                <td>
                                    <a class="btn" href="{{ route('dualSheets.followUps.edit', [$sheet->id, $followUp->id]) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
    
                                <!-- Eliminar -->
                                <td>
                                    @include('partials.general.deletebutton', [
                                        'route' => route('dualSheets.followUps.destroy', [$sheet->id, $followUp->id])
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $followUps->links() }}
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>

</div>
@endsection
