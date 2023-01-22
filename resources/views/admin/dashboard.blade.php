@include('admin.layouts.header')
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
        @include('admin.layouts.container')
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('admin.layouts.footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

