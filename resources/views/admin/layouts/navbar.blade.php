<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top bg-dark">
  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
    <i class="fa fa-bars text-success"></i>
  </button>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw text-success"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in bg-dark"
        aria-labelledby="searchDropdown">
        <form class="navbar-search">
          <div class="input-group">
            <input type="text" class="form-control  border-1 small bg-dark text-success"  placeholder="What do you want to look for?" style="border-color:rgb(36,156,76);"
              aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
            <div class="input-group-append">
              <button class="btn btn-success" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw text-success"></i>
        <span class="badge badge-light text-dark badge-counter">4+</span>
      </a>
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header text-success bg-dark" style="border-color:rgb(36,156,76);">
          Alerts Center
        </h6>
        <a class="dropdown-item d-flex align-items-center" href="#" style="border-color:rgb(36,156,76);">
          <div class="mr-3">
            <div class="icon-circle bg-primary">
              <i class="fas fa-file-alt text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-success">December 12, 2019</div>
            <span class="font-weight-bold text-success">A new monthly report is ready to download!</span>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" style="border-color:rgb(36,156,76);" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-success">December 7, 2019</div>
            <span class="text-success">$290.29 has been deposited into your account!</span>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" style="border-color:rgb(36,156,76);" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-warning">
              <i class="fas fa-exclamation-triangle text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-success">December 2, 2019</div>
            <span class="text-success">Spending Alert: We've noticed unusually high spending for your account.</span>
          </div>
        </a>
        <a class="dropdown-item text-center small text-success" href="#">Show All Alerts</a>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw text-success"></i>
        <span class="badge badge-light text-dark badge-counter">2</span>
      </a>
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header bg-dark text-success" style="border-color:rgb(36,156,76);">
          Message Center
        </h6>
        <a class="dropdown-item d-flex align-items-center bg-dark text-success" style="border-color:rgb(36,156,76);" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="{{asset('/img/deyuuuumm.PNG')}}" style="max-width: 60px" alt="">
            <div class="status-indicator bg-success"></div>
          </div>
          <div class="font-weight-bold" >
            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
              having.</div>
            <div class="small text-success">Udin Cilok · 58m</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center bg-dark text-success" style="border-color:rgb(36,156,76);" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="{{asset('/img/berdu2.PNG')}}" style="max-width: 60px" alt="">
            <div class="status-indicator bg-default"></div>
          </div>
          <div>
            <div class="text-truncate">The reason I ask is because someone told me that people
              say this to all dogs, even if they aren't good...</div>
            <div class="small text-success">Jaenab · 2w</div>
          </div>
        </a>
        <a class="dropdown-item text-center small bg-dark text-success" style="border-color:rgb(36,156,76);" href="#">Read More Messages</a>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-tasks fa-fw text-success"></i>
        <span class="badge badge-light text-dark badge-counter">3</span>
      </a>
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header bg-dark text-success" style="border-color:rgb(36,156,76);">
          Task
        </h6>
        <a class="dropdown-item align-items-center bg-dark"  style="border-color:rgb(36,156,76);" href="#">
          <div class="mb-3">
            <div class="small text-success">Design Button
              <div class="small float-right"><b>50%</b></div>
            </div>
            <div class="progress" style="height: 12px;">
              <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </a>
        <a class="dropdown-item align-items-center bg-dark"  style="border-color:rgb(36,156,76);" href="#">
          <div class="mb-3">
            <div class="small text-success">Make Beautiful Transitions
              <div class="small float-right"><b>30%</b></div>
            </div>
            <div class="progress" style="height: 12px;">
              <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </a>
        <a class="dropdown-item align-items-center bg-dark" style="border-color:rgb(36,156,76);" href="#">
          <div class="mb-3">
            <div class="small text-success">Create Pie Chart
              <div class="small float-right"><b>75%</b></div>
            </div>
            <div class="progress" style="height: 12px;">
              <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </a>
        <a class="dropdown-item text-center small text-success bg-dark" href="#">View All Taks</a>
      </div>
    </li>
    <div class="topbar-divider d-none d-sm-block" style="border-color:rgb(36,156,76);"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false">
        <img class="img-profile rounded-circle" src="{{asset('admin/img/boy.png')}}" style="max-width: 60px;border-color:rgb(36,156,76);">
        <span class="ml-2 d-none d-lg-inline text-white small text-success">{{ Auth()->user()->name }}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark" aria-labelledby="userDropdown">
        <a class="dropdown-item text-success" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-success"></i>
          Profile
        </a>
        <a class="dropdown-item text-success" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-success"></i>
          Settings
        </a>
        <a class="dropdown-item text-success" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-success"></i>
          Activity Log
        </a>

        <div class="dropdown-divider" style="border-color:rgb(36,156,76);"></div>

        <a 
          href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
          class="dropdown-item text-success"
        >
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success"></i>
          Logout
        </a>
        <form action="{{route('logout')}}" id="logout-form" method="POST" style="display: none;">@csrf</form>
      </div>
    </li>
  </ul>
</nav>