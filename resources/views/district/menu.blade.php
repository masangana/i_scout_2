  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href=" {{Route('district.home')}} ">
          <i class="bi bi-grid"></i>
          <span>District</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Groupe</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href=" {{Route('groupes.index')}} ">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>
          <li>
            <a href=" {{Route('groupes.create')}} ">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{Route('groupe_users.index')}}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      
    </ul>

</aside><!-- End Sidebar-->
