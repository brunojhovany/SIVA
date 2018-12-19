{{-- Opciones del header --}}
<li>
    <a href="#" class="tooltipped" data-position="bottom" data-delay="500" data-tooltip="Búsqueda">
        <i class="material-icons">search</i>
    </a>
</li>
<li>
    <a class="dropdown-trigger" href="#!" data-target="dropdownMenu">{{ Auth::user()->name }} &nbsp;<strong style='color:gray'>{{$level->name}}</strong>
        <i class="material-icons right">arrow_drop_down</i>
    </a> 
</li>

<ul id="dropdownMenu" class="dropdown-content">
  @if(Auth::user()->profile ==1 || Auth::user()->profile == 2)
  <li>
    <a href="" style="color:#01579b" id="notificationsbuttons">
      <i class="material-icons">notifications</i>Notificaciones
      <span class="badge">1</span>
    </a>
  </li> 
  <li class="divider"></li>
  <li>
    <a href="/admin/configuracion" style="color:#01579b"><i class="material-icons">settings</i>Configuración</a>
  </li>
  @endif
  <li>
    <a href="#!" style="color:#01579b">
      <i class="material-icons">info_outline</i>Acerca de</a>
  </li>
  <li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:#01579b">
      <form id="" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <i class="material-icons">exit_to_app</i>Salir</a>
  </li>
</ul>