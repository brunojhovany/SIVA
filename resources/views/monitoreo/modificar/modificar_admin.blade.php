@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col s12 m3"></div>
    <div class="col s12 m6">
        <div class="card">
            <div class="card">
                <div class="card-content">
                    <form action="" method="post" id="formmodificar">
                        <span class="card-title">Modificar registro</span>
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
<div class="container">
    <form method="POST" id="modificarregistroForm">
        @csrf
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
                                <input name="{{$R->idregistro}}[MuestraBacteriologica]" type="checkbox" class="filled-in" />
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
<script src="{{asset('js/modificar_admin.js')}}"></script>
@endsection