@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col m3"></div>
		<div class="col s12 m6">
			<br>
			<div class="card">
					<div class="card-action blue white-text">
							<h6>Subir manuales</h6>
					</div>

					<div class="card-content">
						<form id="up_file" method="POST" action="" enctype="multipart/form-data">
							<div class="row">
								<div class="input-field col s12">
									<input id="titulo" type="text" name="titulo">
									<label class="" for="titulo">Titulo</label>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
									<textarea id="descripcion" type="text" name="descripcion" class="materialize-textarea"></textarea>
									<label for="descripcion">Descripcion</label>
								</div>
							</div>
							
							<div class="file-field input-field">
								<div class="btn">
									<span>Archivo</span>
									<input type="file" name="archivo">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text" name="nombre_archivo" placeholder="Seleccionar archivo">
								</div>
							</div>          

							<div class="form-field">
								<button class="btn waves-effect waves-light" style="width: 100%" type="submit" value="submit" name="action">Subir
								<i class="material-icons right">send</i>
								</button>                                
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
@endsection
@section('content_js')
<script src="{{ asset('js/upfile_form.js') }}"></script>
@endsection

