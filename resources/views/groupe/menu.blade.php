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
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Unités</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{Route('groupe.meute')}}">
              <i class="bi bi-circle"></i><span>Meute</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.troupe')}}">
              <i class="bi bi-circle"></i><span>Troupe</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.compagnie')}}">
              <i class="bi bi-circle"></i><span>Compagnie</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.clan')}}">
              <i class="bi bi-circle"></i><span>Clan</span>
            </a>
          </li>
          <li>
            <a href="{{Route('groupe.route')}}">
              <i class="bi bi-circle"></i><span>Route</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Membres</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href=" {{Route('personnes.create')}} ">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

    </ul>

  </aside><!-- End Sidebar-->
