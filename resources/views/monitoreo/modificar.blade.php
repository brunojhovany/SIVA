@extends('layouts.app')
@section('content')
    @if (Auth::user()->profile == 1)
       @include('monitoreo.modificar.modificar_admin')
    @else
       @include('monitoreo.modificar.modificar_jurisdiccional')
    @endif
@endsection