@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col s12 m10 offset-m1">
			<table class="responsive-table">
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th>Nombre</th>
						<th>Desargar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($newFiles as $newFile)
						<tr>
							<td>{{ $newFile->titulo }}</td>
								<td>{{ $newFile->descripcion }}</td>
								<td>{{ $newFile->nombre_archivo }}</td>
								<td><a href="/guides/download/{{$newFile->nombre_archivo}}"><i class="material-icons">file_download</i></a></td>
								<td><a href="guides/delete/{{$newFile->nombre_archivo}}"><i class="material-icons">delete</i></a></td>
							</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="fixed-action-btn">
			<a href="/admin/configuracion/admonguides/upfile" class="btn-floating pulse btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
		</div>
</div>
@endsection
@section('content_js')
@endsection