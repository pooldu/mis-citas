<!-- Navigation -->
@if (auth()->user()->role == 'admin')
  <h6 class="navbar-heading text-muted">Gestión de Datos</h6>
@else
  <h6 class="navbar-heading text-muted">Menú</h6>
@endif
<ul class="navbar-nav">
  @if (auth()->user()->role == 'admin')
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="ni ni-tv-2 text-red"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/specialties">
        <i class="ni ni-atom text-green"></i> Especialidades
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/doctors">
        <i class="ni ni-circle-08 text-blue"></i> Medicos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/patients">
        <i class="ni ni-satisfied text-info"></i> Pacientes
      </a>
    </li>
  @elseif (auth()->user()->role == 'doctor')
    <li class="nav-item">
      <a class="nav-link" href="/schedule">
        <i class="ni ni-calendar-grid-58 text-red"></i> Gestionar Horario
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/specialties">
        <i class="ni ni-time-alarm text-green"></i> Mis Citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/doctors">
        <i class="ni ni-circle-08 text-blue"></i> Mis Pacientes
      </a>
    </li>
  @else {{--patient--}}
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="ni ni-send text-red"></i> Reservar Cita
      </a>
    </li>
    <li class="nav-item">
    <li class="nav-item">
      <a class="nav-link" href="/specialties">
        <i class="ni ni-time-alarm text-green"></i> Mis Citas
      </a>
    </li>
  @endif
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="ni ni-button-power"></i> Cerrar Sesión
    </a>
    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
    	@csrf
    </form>
  </li>
</ul>
@if (auth()->user()->role == 'admin')
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
      <i class="ni ni-calendar-grid-58 text-purple"></i> Frecuencia de Citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
      <i class="ni ni-archive-2 text-red"></i> Médicos más Activos
    </a>
  </li>
</ul>
@endif
