@extends('layouts.app')
@section('content')
    <div class="center">
	<form id="range_historic" method="POST">
		<span class="title"><h5>Resultados bacteriologicos por mes</h5></span>
		<div class="container">
			<div class="row">
				<div class="input-field col s10 m4 hide-on-med-and-down"></div>
				<div class="input-field col s10 m4">
					<input id="week_select" type="number" class="validate">
					<label for="week_name">Mes</label>
				</div>
				<div class="col s1 m1">
					<button class="btn-floating waves-effect waves-light red" type="submit" value="submit"><i class="material-icons">search</i></button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection