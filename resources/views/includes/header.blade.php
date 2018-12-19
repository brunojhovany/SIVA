<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper light-blue darken-4">
      @auth
      <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
      @endauth
      <a href="/home" class="brand-logo hide-on-med-and-down">SIVA</a>
      <a href="/home" class="brand-logo hide-on-large-only">SIVA</a>
      <ul class="right hide-on-med-and-down">
        @guest
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
        @switch(Auth::user()->tipouser)
        @case(0)
          @include('includes.dropdown_options')
          @break
        @endswitch
        @endguest
      </ul>
    </div>
  </nav>
</div>