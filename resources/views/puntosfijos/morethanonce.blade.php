@extends('layouts.app') @section('content')
<div class="container">
    <form method="POST">
        <table class="striped highlight responsive-table">
            <thead>
                <th hidden>ID</th>
                <th>Folio</th>
                <th>Municipio</th>
                <th>Localidad</th>
                <th>Domicilio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Valor</th>
                <th>Sín Servicio</th>
                <th>Causas</th>
                <th>Acciones</th>
                <th>Muestra para el análisis bacteriológico</th>
            </thead>
            <tbody>
                @foreach ($Registros as $R)
                <tr>
                    <td hidden>{{$R->idregistro}}</td>
                    <td>{{$R->folio}}</td>
                    <td>{{$R->nombreM}}</td>
                    <td>{{$R->nombreL}}</td>
                    <td>{{$R->domicilio}}</td>
                    <td><input type="text" class="datepicker" placeholder="Fecha"></td>
                    <td><input type="text" class="timepicker" placeholder="Hora"></td>
                    <td><input type="text" placeholder="valor"></td>
                    <td>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" />
                                <span>S/S</span>
                            </label>
                        </p>
                    </td>
                    <td><input type="text" placeholder="Causas"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    {{ $Registros->links()}}
</div>
@endsection @section('content_js')
<script src="{{asset('js/morethanonce.js')}}"></script> @endsection