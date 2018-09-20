@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col m3"></div>
	<div class="col m6">
		<form id="range_historic" method="POST">
			<span class="title"><h5>Selección de año y semana</h5></span>
			<div class="row">
				<p>
					<div class="input-field col s5 m4">
						<input placeholder="Ingresar año" id="year_select" type="number" class="validate">
						<label for="year_select">Año</label>
					</div>
					<div class="input-field col s5 m4">
						<input placeholder="Ingresar semana" id="week_select" type="number" class="validate">
						<label for="week_name">Semana</label>
					</div>
					<div class="col s1 m1">
						<button class="btn-floating waves-effect waves-light red" type="submit" value="submit"><i class="material-icons">check</i></button>
					</div>
				</p>
			</div>
		</form>
	</div>
</div>
<div id="renderspace">@include('configuracion.view_list_historic')</div>

@endsection
@section('content_js')
    <script src="{{asset('js/historic_range.js')}}"></script>
@endsection