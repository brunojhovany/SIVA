@extends('layouts.app')
@section('content')
@endsection
@section('content_js')
    <div style="margin-top:10%">
        <div class="row">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Administrar Usuarios</span>
                            <p class="center"><i class="large material-icons">face</i></p>
                        </div>
                        <div class="card-action">
                            <a href='/admin/configuracion/admonusers'>Administrar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Administrar Avisos</span>
                            <p class="center"><i class="large material-icons">info</i></p>
                        </div>
                        <div class="card-action">
                            <a href='/admin/configuracion/admonnotifictions'>Administrar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Administrar Manuales</span>
                            <p class="center"><i class="large material-icons">book</i></p>
                        </div>
                        <div class="card-action">
                            <a href='/admin/configuracion/admonguides'>Administrar</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col s12 m3">
                <div class="card">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Registro</span>
                            <p class="center"><i class="large material-icons">assignment_turned_in</i></p>
                        </div>
                        <div class="card-action">
                            <a href='/admin/configuracion/admonregister'>Administrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection