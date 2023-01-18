  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{Route('groupe.home')}}">
          <i class="bi bi-grid"></i>
          <span>Groupe </span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link   @if(!Request()->routeIs('groupe.meute')) collapsed @endif"
           data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Unités</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if(Request()->routeIs('groupe.meute') || 
            Request()->routeIs('groupe.troupe') || Request()->routeIs('groupe.compagnie') ||
            Request()->routeIs('groupe.clan') || Request()->routeIs('groupe.route')) show @endif "
            data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{Route('groupe.meute')}}" class="@if(Request()->routeIs('groupe.meute')) active @endif">
              <i class="bi bi-circle"></i><span>Meute</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.troupe')}}" class="@if(Request()->routeIs('groupe.troupe')) active @endif">
              <i class="bi bi-circle"></i><span>Troupe</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.compagnie')}}" class="@if(Request()->routeIs('groupe.compagnie')) active @endif">
              <i class="bi bi-circle"></i><span>Compagnie</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.clan')}}" class="@if(Request()->routeIs('groupe.clan')) active @endif">
              <i class="bi bi-circle"></i><span>Clan</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.route')}}" class="@if(Request()->routeIs('groupe.route')) active @endif">
              <i class="bi bi-circle"></i><span>Route</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link @if(!Request()->routeIs('personnes.create')) collapsed @endif"
           data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Membres</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse  @if(Request()->routeIs('personnes.create')) show @endif"
            data-bs-parent="#sidebar-nav">
          <li>
            <a href=" {{Route('personnes.create')}} " class="@if(Request()->routeIs('personnes.create')) active @endif">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

    </ul>

  </aside><!-- End Sidebar-->
