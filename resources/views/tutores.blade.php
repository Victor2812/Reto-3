@extends('layouts.app')

@section('title', 'Tutores')

@section('main')
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Tutores</h1>
        <a href="#" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>

    <div class="row">
        <div class="col-12 px-4">
            <div class="table-responsive">
                <table class="tablita-guapa" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>Mail</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
