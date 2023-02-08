@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')
    @if (Auth::user()->isCoordinator())
        @include('dashboards.coordinator')
    @else
        <h1>No deberías poder ver esto</h1>
    @endif
@endsection
