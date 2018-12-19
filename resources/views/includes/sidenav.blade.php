<ul id="slide-out" class="sidenav">
  <li>
    <div class="user-view">
      <div class="background">
        <img src="https://images.unsplash.com/photo-1503754163129-a02a0c097de0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e7c17eaac9f6de7265bd498663c17cc6&auto=format&fit=crop&w=300&q=80">
      </div>
      <a href="#user"><img class="circle" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-0.3.5&s=d6aa3148589eba801d466a21c6847255&auto=format&fit=crop&w=750&q=80"></a>
      <a href="#name"><span class="white-text name">{{Auth::user()->name}}</span></a>
      <a href="#email"><span class="white-text email">{{auth::user()->email}}</span></a>
    </div>
  </li>
  <li class="hide-on-large-only">
    <a href="#!" style="color:#01579b" id="notificationsbtnsidebar">
      <i class="material-icons">notifications</i>Notificaciones
      <span class="badge">1</span>
    </a>
  </li>
  <li class="hide-on-large-only">
    <div class="divider"></div>
  </li>
  <li><a class="subheader">Navegación de la pagina</a></li>
  <li><a class="waves-effect" href="#!"><i class="material-icons">home</i>Inicio</a></li>
  <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Monitoreo<i class="material-icons">arrow_drop_down</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a @if (auth::user()->profile==1) href="#"
                onclick="modificarFunc(); $('.sidenav').sidenav('close');"
            @else
                href="/monitoreo/modificar"
            @endif>Modificar</a></li>
            @if (auth::user()->profile==1)
              <li><a href="#" onclick="eliminarFunc(); $('.sidenav').sidenav('close');">Eliminar</a></li>
            @endif
            <li><a href="#" onclick="resultadosBacteriologicos()">Resultados bacteriologicos</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Capturar puntos fijos<i class="material-icons">arrow_drop_down</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a id="onlyone" href="/capturarpuntos/unavez">Una vez</a></li>
            <li><a id="morethanonce" href="/capturarpuntos/masdeunavez">Mas deuna vez</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Reportes<i class="material-icons">arrow_drop_down</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="#!">Mensual jurisdiccional</a></li>
            <li><a href="/reporte/reporte_mensual_de_municipio">Municipio</a></li>
            <li><a href="#!">Localidad</a></li>
            <li><a href="#!">Concentrado semanal</a></li>
            <li><a href="#!">Monitoreo</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <li><a href="/configuracion/lista-manuales"><i class="material-icons">class</i>Manuales</a></li>
  <li><a href="/ver/historial"><i class="material-icons">history</i>Historial</a></li>
  <li class="hide-on-large-only"><a href="/admin/configuracion"><i class="material-icons">settings</i>Configuración</a></li>
  <li class="hide-on-large-only">
    <a href="#!" style="color:#01579b">
      <i class="material-icons">info_outline</i>Acerca de</a>
  </li>
  <li class="hide-on-large-only">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:#01579b">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <i class="material-icons">exit_to_app</i>Salir</a>
  </li>
</ul>