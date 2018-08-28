@extends('layouts.app') 
@section('content')
<div class="container">
    <form method="POST">
        <div class="row">
            <div class="input-field col s12 m6">
                <select id='MunicipioSelect' required name="Municipio" class="MunicipioSelect" oninvalid="M.toast({html:'Seleccione un Municipio',classes:'rounded red'})">
                    <option value="" disabled selected>Municipio</option>
                </select>
            </div>
            <div class="input-field col s12 m6">
                <select id='LocalidadSelect' required name="Localidad" oninvalid="M.toast({html:'Seleccione una Localidad',classes:'rounded red'})">
                    <option value="" disabled selected>Localidad</option>
                </select>
            </div>
        </div>
    </form>
</div>
@endsection 
@section('content_js')
<script src="{{ asset('js/pre_register.js') }}"></script>
@endsection