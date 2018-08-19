{{-- Opciones del header --}}
<li>
    <a href="#" class="tooltipped" data-position="bottom" data-delay="500" data-tooltip="Búsqueda">
        <i class="material-icons">search</i>
    </a>
</li>
<li>
    <a id="RegistroPaciente" class="tooltipped modal-trigger" data-position="bottom" data-delay="500" data-tooltip="Registrar paciente">
        <i class="material-icons">person_add</i>
    </a>
</li>
<li>
    <a class="dropdown-trigger" href="#!" data-target="dropdownMenu">{{Auth::user()->name}}
        <i class="material-icons right">arrow_drop_down</i>
    </a>
</li>

{{-- Dropdown para medicos --}}
<ul id="dropdownMenu" class="dropdown-content">
  <li>
    <a href="#!">
      <i class="material-icons">account_circle</i>Mi perfil
    </a>
  </li>
  <li>
    <a href="#!">
      <i class="material-icons">notifications</i>Notificaciones
      <span class="badge">1</span>
    </a>
  </li>
  <li>
    <a href="#!">
      <i class="material-icons">message</i>Mensajes
      <span class="new badge">1</span>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <a href="#!">
      <i class="material-icons">info_outline</i>Acerca de</a>
  </li>
  <li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <i class="material-icons">exit_to_app</i>Salir</a>
  </li>
</ul>