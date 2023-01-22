@include('admin.layouts.header')
@csrf
  <div id="wrapper" class="bg-dark">
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column bg-dark">
      <div id="content">
        <!-- TopBar -->
        @include('admin.layouts.navbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
        @yield('content')
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('admin.layouts.footer')
      <!-- Footer -->
    </div>
  </div>
