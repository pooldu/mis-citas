<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestión de Datos</h6>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="./dashboard">
      <i class="ni ni-tv-2 text-red"></i> Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./specialties">
      <i class="ni ni-atom text-green"></i> Especialidades
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./doctors">
      <i class="ni ni-circle-08 text-blue"></i> Medicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=".patients">
      <i class="ni ni-satisfied text-info"></i> Pacientes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./patients">
      <i class="ni ni-calendar-grid-58 text-red"></i> Horarios
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="ni ni-button-power"></i> Cerrar Sesión
    </a>
    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
    	@csrf
    </form>
  </li>
</ul>
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
