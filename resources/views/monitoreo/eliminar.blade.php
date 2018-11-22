@extends('layouts.app')
@section('content')
    <div class="center">
	<form id="range_historic" method="POST">
		<span class="title"><h5>Eliminar registros</h5></span>
		<div class="container">
			<div class="row">
				<div class="input-field col s5 m4">
					
				</div>
				<div class="input-field col s5 m4">
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
<div class="container">
    <form method="POST" id="modificarregistroForm">
        <table class="striped highlight responsive-table">
            <thead>
                <th hidden>ID</th>
                <th>Folio</th>
                <th>Municipio</th>
                <th>Localidad</th>
                <th>Domicilio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Sín/Serv</th>
                <th>Causas</th>
                <th>Acciones</th>
                <th>Muestra/bact</th>
                <th>Capturista</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                @foreach ($Registros as $R)
                <tr>
                    <td hidden><input name="{{$R->idregistro}}[idregistro]" type="text" value="{{$R->idregistro}}"></td>
                    <td>{{$R->folio}}</td>
                    <td>{{$R->nombreM}}</td>
                    <td>{{$R->nombreL}}</td>
                    <td>{{$R->domicilio}}</td>
                    <td>{{$R->fecha}}</td>
                    <td>{{$R->hora}}</td>
                    <td>
                        <p>
                            <label>
                                <input name="{{$R->idregistro}}[habilitar]" type="checkbox" class="filled-in" />
                                <span></span>
                            </label>
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button id="submitMod" type="submit" class="btn-floating btn-large waves-effect waves-light red right tooltipped" data-position="bottom" data-tooltip="Eliminar" style="display:none;"><i class="material-icons">delete_sweep</i></button>
    </form>
    {{ $Registros->links()}}
<div class="container">
	<ul class="collapsible">
	@foreach ($Registros as $W)
		<li>
			<div class="collapsible-header">
			<i class="material-icons">insert_drive_file</i>
			<strong>Folio:</strong> {{$W->folio}}&nbsp;<strong>Municipio:</strong>{{$W->nombreM}}
			{{-- <span class="new badge">4</span> --}}
            </div>
			<div class="collapsible-body"><p>
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
                <div class="right"><input type="checkbox" name="" id=""> <span></span></div>
			</p></div>
		</li>
	@endforeach
	</ul>
</div>
<script>
M.AutoInit();
</script>
   
</div>
@endunless
<script src="{{asset('js/eliminar_admin.js')}}"></script>
@endsection