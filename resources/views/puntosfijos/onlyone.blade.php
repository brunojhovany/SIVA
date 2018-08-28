@extends('layouts.app') @section('content')
<div class="container">
    <h4>Comisión para la protección contra riesgos sanitarios</h4>
    <form action="" method="POST" id="onlyOneForm">
         @csrf
        <div class="row">
            <div class="input-field col s12 m6">
                <select id='MunicipioSelect' required name="Municipio" class="MunicipioSelect" oninvalid="M.toast({html:'Seleccione un Municipio',classes:'rounded red'})">
                    <option value="" disabled selected>Municipio</option>
                    @foreach ($Municipios as $M)
                        <option value="{{$M->idmunicipio}}">{{$M->nombreM}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12 m6">
                <select id='LocalidadSelect' required name="Localidad" oninvalid="M.toast({html:'Seleccione una Localidad',classes:'rounded red'})">
                    <option value="" disabled selected>Localidad</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <select id="DireccionSelect" required name="Direccion" oninvalid="M.toast({html:'Seleccione una Dirección',classes:'rounded red'})">
                    <option value="" disabled selected>Dirección</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input type="text" name="Fecha" class="datepicker" id="fecha" required>
                <label class="active" for="fecha">Fecha</label>
            </div>
        
            <div class="input-field col s12 m6">
                <input type="text" name="Hora" class="timepicker" id="hora" required>
                <label class="active" for="hora">Hora</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s7 m10">
                <input id="valor" type="text" name="Valor" class="validate" required>
                <label class="active" for="valor">Valor</label>
            </div>
            <div class="input-field col s5 m2">
                <p>
                    <label>
                        <input name="Servicio" type="checkbox" class="filled-in" required/>
                        <span>Sin servicio</span>
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="causas" type="text" name="Causas" class="validate">
                <label class="active" for="causas">Causas</label>
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s12">
                <input id="accion" type="text" name="Acciones" class="validate">
                <label class="active" for="accion">Acciones Ejecutadas</label>
            </div>
            <div class="input-field col s12">
                <p>
                    <label>
                        <input type="checkbox" name="Bacteriologico" class="filled-in"/>
                        <span>Tomó muestra para análisis bacteriológico</span>
                    </label>
                </p>
            </div>
        </div>
        <button class="btn waves-effect waves-light right" style="width:100%" type="submit" name="action">Guardar
            <i class="material-icons right">send</i>
        </button>
        <br>
        <br>
    </form>
</div>
@endsection 
@section('content_js')
<script src="{{ asset('js/onlyone.js') }}"></script>
@endsection