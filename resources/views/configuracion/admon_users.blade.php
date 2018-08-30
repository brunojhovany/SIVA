@extends('layouts.app')
@section('content')
<div class="row">
            <div class="col s12 m10 offset-m1">
                <table class="highlight striped responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre usuario</th>
                            <th>Correo</th>
                            <th>Tipo de usuario</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $U)               
                            <tr>
                                <td>{{$U->id}}</td>
                                <td>{{$U->name}}</td>
                                <td>{{$U->email}}</td>
                                <td>{{$U->level}}</td>
                                <td><a href=""><i class="material-icons">edit</i></a></td>
                                <td><a href=""><i class="material-icons">delete</i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="fixed-action-btn">
            <a href="agrega_user.php" class="btn-floating pulse btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
@endsection
@section('content_js')
@endsection