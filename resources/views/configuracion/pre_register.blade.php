@extends('layouts.app') 
@section('content')
<div class="container">
    <form method="POST" id="admonregisterform">
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
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name="Direccion"></textarea>
                <label for="textarea1">Dirección</label>
            </div>
        </div>
         <button class="btn waves-effect waves-light right" style="width:100%; margin-top:10%;" type="submit" name="action">Guardar
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
@endsection 
@section('content_js')
<script src="{{ asset('js/pre_register.js') }}"></script>
@endsection