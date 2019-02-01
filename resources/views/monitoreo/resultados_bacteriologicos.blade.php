@extends('layouts.app')
@section('content')
    <div class="center">
	<form id="month" method="POST">
		<span class="title"><h5>Resultados bacteriologicos por mes</h5></span>
		<div class="container">
			<div class="row">
				<div class="input-field col s10 m4 hide-on-med-and-down"></div>
				<div class="input-field col s10 m4">
					<select id="moth_select" class="validate">
      					<option value="" disabled selected>Seleccione un mes</option>
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
					<button class="btn-floating waves-effect waves-light red" type="" value=""><i class="material-icons">search</i></button>
				</div>
			</div>
		</div>
	</form>
</div>
@unless($Registros->count()>0)
    <h1 class="center">Sin registros en dicho mes</h1>
@else
	@foreach ($Registros as $R)
		<h6>{{$R->folio}}</h6>
	@endforeach
@endunless
	<script src="{{asset('js/muestras.js')}}"></script>
@endsection