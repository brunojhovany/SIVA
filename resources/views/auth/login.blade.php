@extends('layouts.app') @section('content')
<div class="container">
  <div style="margin-top:12%;" class="row justify-content-center">
    <div class="card">
      <form action="{{ route('login') }}" method="post" aria-label="{{__('Login')}}">
        @csrf
        <div class="card-content">
          <div class="row">
            <div class="input-field col s5">
              <i class="material-icons prefix">alternate_email</i>
              <input name="email" id="icon_prefix" type="email" class="validate">
              <label for="icon_prefix">Correo Electrónico</label>
              @if ($errors->has('email'))
              <span class="helper-text" style="color:red;" role="alert">
                {{ $errors->first('email') }}
              </span>
              @endif
            </div>
            <div class="input-field col s5">
              <i class="material-icons prefix">vpn_key</i>
              <input name="password" id="icon_telephone" type="password" class="validate">
              <label for="icon_telephone">Contraseña</label>
              @if ($errors->has('password'))
              <span class="helper-text" style="color:red;" data-error="wrong" data-success="right">{{ $errors->first('password') }}</span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 offset-s6">
              <label>
                <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                <span>Recordar</span>
              </label>
            </div>
          </div>
        </div>
        <div class="card-action">
          <button class="btn-flat" type="submit">Iniciar sesión</button>
          <a class="btn-flat" href="{{ route('password.request') }}">{{ __('Olvidó su contraseña?') }}</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection