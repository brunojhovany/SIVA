<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo hide-on-med-and-down">{{ config('app.name') }}</a>
      <a href="#!" class="brand-logo hide-on-large-only">{{ config('app.name') }}</a>
      <a href="#" data-target="slide-out-mobile-menu" class="sidenav-trigger">
        <i class="material-icons">menu</i>
      </a>
      <ul class="right hide-on-med-and-down">
        @guest
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
        @switch(Auth::user()->tipouser)
        @case(5)
        @case(0)
          @include('includes.dropdown_options')
          @break
        @endswitch
        @endguest
      </ul>
    </div>
  </nav>
</div>