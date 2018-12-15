@extends('layouts.app')
@section('content')
<div class="center">
	<form id="formmodificar" method="POST">
		<span class="title"><h5>Modificar Registros</h5></span>
		<div class="container">
			<div class="row">
				<div class="input-field col s5 m4">
					
				</div>
				<div class="input-field col s5 m4">
					<input name="semana" id="semanainput" type="number" class="validate">
					<label for="semanainput">Semana</label>
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
                <th>Habilitar</th>
            </thead>
            <tbody>
                @foreach ($Registros as $R)
                <tr>
                    <td hidden><input name="{{$R->idregistro}}[idregistro]" type="text" value="{{$R->idregistro}}"></td>
                    <td>{{$R->folio}}</td>
                    <td>{{$R->nombreM}}</td>
                    <td>{{$R->nombreL}}</td>
                    <td>{{$R->domicilio}}</td>
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
        <button id="submitMod" type="submit" class="btn-floating btn-large waves-effect waves-light red right tooltipped" data-position="bottom" data-tooltip="Guardar" style="display:none;"><i class="material-icons">save_alt</i></button>
    </form>
    {{ $Registros->links()}}
</div>
@endunless
<script src="{{asset('js/modificar_admin.js')}}"></script>
@endsection