@extends('layouts.app')

@section('title', "Fichas Duales | $student->name $student->surname")

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('dualSheets.show', $student) }}

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

        <!-- Ficha Dual -->
        <div class="row px-4 gx-0 my-3">

            <!-- Titulo -->
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 px-5">Fichas Duales</h1>
            </div>
            <!-- End Titulo -->

        <div class="row px-4 gx-0 my-3">
            <div class="table-responsive-sm">
                <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Año escolar</th>
                            <th class="d-none d-sm-table-cell">Tutor</th>
                            <th class="d-none d-sm-table-cell">Compañía</th>
                            <th class="d-none d-sm-table-cell">Curso</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sheets as $sheet)
                        <tr>
                            <td>{{ $sheet->schoolYear()->first()->toText() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $sheet->academicTutor()->first()->fullName() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $sheet->company()->first()->name }}</td>
                            <td class="d-none d-sm-table-cell">{{ $sheet->course()->first()->name }}</td>

                            <!-- Ver -->
                            <td>
                                <a class="btn" href="{{ route('students.show', [$sheet->student_id, 'sheet' => $sheet->id]) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>

                            <!-- Editar -->
                            <td>
                                <a class="btn" href="{{ route('dualSheets.edit', [$student, 'sheet' => $sheet]) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>

                            <!-- Eliminar -->
                            <td>
                                @include('partials.general.deletebutton', [
                                    'route' => route('dualSheets.destroy', [$sheet->id])
                                ])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Row -->
    </div>

</div>
@endsection
