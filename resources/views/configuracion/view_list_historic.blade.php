<div class="container">
	<ul class="collapsible">
	@foreach ($week as $W)
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
			</p></div>
		</li>
	@endforeach
	</ul>
</div>
<script>
M.AutoInit();
</script>