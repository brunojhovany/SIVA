@extends('layouts.app')
@section('content')
    <div class="row">
    <div class="col s12 m3"></div>
    <div class="col s12 m6">
        <div class="card">
            <div class="card">
                <div class="card-content">
                    <form action="" method="post" id="formmodificar">
                        <span class="card-title">Buscar registros para eliminar</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">calendar_today</i>
                                <input name="semana" id="semanainput" type="number" class="validate" required>
                                <label for="semanainput">Semana</label>
                            </div>
                        </div>
                        <button class="btn-floating btn-large waves-effect waves-light red right tooltipped" type="submit" data-tooltip="Búscar"><i class="material-icons">search</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
</div>
@endunless
<script src="{{asset('js/eliminar_admin.js')}}"></script>
@endsection