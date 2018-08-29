@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col m2"></div>
        <div class="col m8">
					<div class="row">
							<div class="card z-depth-3">
									<div class="card-action blue white-text">
											<h6>Comisión para la protección contra riesgos sanitarios</h6>
									</div>

									<h6>Coordinación de protección sanitaria</h6>
									<hr>
									<div class="card-content">
											<form method="POST" id="notificationsform">
													<div class="row">
															<div class="input-field col s12">
																	<textarea id="descripcion" type="text" name="descripcion_aviso" class="materialize-textarea"></textarea>
																	<label for="descripcion">Descripción</label>
																	<input type="hidden" name="edit_description" value="">
															</div>
													</div>
													
													<div class="form-field">
															<button class="btn waves-effect waves-light" style="width: 100%" type="submit" value="submit" name="action">Enviar
															<i class="material-icons right">send</i>
															</button>                                
													</div>
											</form>										
									</div>
							</div>
					</div>
        </div>
        <div class="col"></div>
    </div>
@endsection
@section('content_js')
<script src="{{ asset('js/notificationsform.js') }}"></script>
@endsection