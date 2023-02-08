@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')
    @if (Auth::user()->isCoordinator())
        @include('dashboards.coordinator')
    @elseif (Auth::user()->isTutor())
        @include('dashboards.tutor')
    @else
        @include('dashboards.student')
    @endif
@endsection
