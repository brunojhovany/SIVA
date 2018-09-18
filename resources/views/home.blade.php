@extends('layouts.app')

@section('content')
<div class="container">
    <div id='rendercontent'>
        <h3 class="center" style="margin-top: 20%;">Bienvenido {{Auth::user()->name}} a SIVA</h3>
    </div>
</div>
@endsection
