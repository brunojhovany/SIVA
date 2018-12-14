@extends('layouts.app')
@section('content')
    <div class="center">
	<form id="range_historic" method="POST">
		<span class="title"><h5>Eliminar registros</h5></span>
		<div class="container">
			<div class="row">
				<div class="input-field col s10 m4 hide-on-med-and-down"></div>
				<div class="input-field col s10 m4">
					<input id="week_select" type="number" class="validate">
					<label for="week_name">Semana</label>
				</div>
				<div class="col s1 m1">
					<button class="btn-floating waves-effect waves-light red" type="submit" value="submit"><i class="material-icons">search</i></button>
				</div>
			</div>
		</div>
	</form>
</div>
@unless($Registros->count()>0)
    <h1 class="center">Sin registros para habilitar</h1>
@else
<div class="renderspace">
<div class="container">
	<ul class="collapsible">
	@foreach ($Registros as $W)
		<li>
			<div class="collapsible-header">
			<i class="material-icons">insert_drive_file</i>
			<strong>Folio:</strong> {{$W->folio}}&nbsp;{{--<strong>Municipio:</strong>{{$W->nombreM}}--}}
			<span class="badge">
				<a onclick="deleteregistros({{$W->idregistro}})" class="waves-effect waves-light btn red"><i class="material-icons right">delete</i></a>
			</span>
            </div>
			<div class="collapsible-body">
                <p>
				<strong>Localidad:</strong> {{$W->nombreL}} <br>
				<strong>Domicilio:</strong> {{$W->domicilio}} <br>
				<strong>Fecha:</strong> {{$W->fecha}} <br>
				<strong>Hora:</strong> {{$W->hora}} <br>
				<strong>Valor:</strong> {{$W->valor}} <br>
				<strong>Sín Servicio:</strong> 
				@if($W->sin_servicio == 1)
				Si <br>
				@else
				No <br>
				@endif
				<strong>Causas:</strong> {{$W->causas}} <br>
				<strong>Acciones:</strong> {{$W->acciones}} <br>
				<strong>Muestra bacteriológica:</strong> 
				@if($W->muestra == 1)
				Si <br>
				@else
				No <br>
				@endif
                <strong>Capturista:</strong> {{$W->name}}
			    </p>
            </div>
		</li>
	@endforeach
	</ul>
    {{ $Registros->links()}}
</div>
<script>
M.AutoInit();
</script>
</div>
@endunless
<script src="{{asset('js/eliminar_admin.js')}}"></script>
@endsection
