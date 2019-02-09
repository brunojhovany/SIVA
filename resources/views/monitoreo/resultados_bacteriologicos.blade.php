@extends('layouts.app') @section('content')
<div class="center">
    <form id="month" method="POST">
        <span class="title"><h5>Resultados bacteriologicos por mes</h5></span>
        <div class="container">
            <div class="row">
                <div class="input-field col s10 m4 hide-on-med-and-down"></div>
                <div class="input-field col s10 m4">
                    <select id="moth_select" class="validate">
                        <option value="" disabled selected
                            >Seleccione un mes</option
                        >
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septeiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    <label>Resultados por mes</label>
                </div>
                <div class="col s1 m1">
                    <button
                        class="btn-floating waves-effect waves-light red"
                        type=""
                        value=""
                    >
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<div>
	<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Semana</th>
            <th>Folio</th>
            <th>Municipio</th>
            <th>Localidad</th>
            <th>Domicilio</th>
            <th>Fecha</th>
            <th>Sin Servicio</th>
            <th>Con presencia de coliformes</th>
            <th></th>
        </tr>
	</thead>
	<tbody>
		@unless($Registros->count()>0)
		<h1 class="center">Sin registros en el mes</h1>
		@else @foreach ($Registros as $R)
		<tr>
            <td style="display:none;"><input name="{{$R->idregistro}}[idregistro]" placeholder="{{$R->idregistro}}" type="text" disabled></td>
            <td>{{$R->idregistro}}</td>
            <td>{{$R->semana}}</td>
            <td>{{$R->folio}}</td>
            <td>{{$R->nombreM}}</td>
            <td>{{$R->nombreL}}</td>
            <td>{{$R->domicilio}}</td>
            <td>{{$R->fecha}}</td>
            @if ($R->sin_servicio == 1)
                <td>Si</td>
            @else
            <td>No</td>
            @endif
            <td>
                <p>
                    <label>
                        <input name="{{$R->idregistro}}[MuestraBacteriologica]" type="checkbox" class="filled-in" />
                            <span></span>
                        </label>
                    </p>
                </td>
		    </tr>
		@endforeach 
		@endunless
	</tbody>
</table>
{{ $Registros->links()}}
</div>
<script src="{{ asset('js/muestras.js') }}"></script>
@endsection
