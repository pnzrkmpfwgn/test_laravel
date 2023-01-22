<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center bg-dark" href="#">
    <div class="sidebar-brand-icon">
    </div>
    <div class="sidebar-brand-text mx-3 text-success">Real Estate Admin</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active bg-dark">
    <a class="nav-link" href="/">
      <i class="fas fa-fw fa-tachometer-alt text-success"></i>
      <span class="text-success">Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading bg-dark text-success">
    Features
  </div>

  <!-- Categories -->
  <li class="nav-item bg-dark">
    <a class="nav-link collapsed bg-dark" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="far fa-fw fa-window-maximize text-success"></i>
      <span class="text-success">Categories</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="py-2 collapse-inner rounded bg-dark">
        <h6 class="collapse-header text-success">Category</h6>
        <a class="collapse-item text-success" href="{{route('category.index')}}">All</a>
        <a class="collapse-item text-success" href="{{route('category.create')}}">Create</a>
      </div>
    </div>
  </li>

  {{-- Properties --}}
  <li class="nav-item bg-dark">
    <a class="nav-link collapsed bg-dark" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-table text-success"></i>
      <span class="text-success">Properties</span>
    </a>
    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="py-2 collapse-inner rounded bg-dark">
        <h6 class="collapse-header text-success">Properties</h6>
        <a class="collapse-item text-success" href="{{route('property.index')}}">View</a>
        <a class="collapse-item text-success" href="{{route('property.create')}}">Create</a>
      </div>
    </div>
  </li>

  <li class="nav-item bg-dark">
    <a class="nav-link collapsed bg-dark" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
      aria-expanded="true" aria-controls="collapseBootstrap4">
      <i class="far fa-fw fa-window-maximize text-success"></i>
      <span class="text-success">Users</span>
    </a>
    <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="py-2 collapse-inner rounded bg-dark">
        <h6 class="collapse-header text-success">Users </h6>
        <a class="collapse-item text-success" href="{{route('user.index')}}">View all users</a> 
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">

  {{-- Logout --}}
  <li class="nav-item bg-dark">
    <a
      href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      class="dropdown-item text-success"
    >
      <i class="fas fa-sign-out-alt  mr-1 text-success"></i>Logout
    </a>
    <form action="{{route('logout')}}" id="logout-form" method="POST" style="display: none;">@csrf</form>
  </li>



</ul>
