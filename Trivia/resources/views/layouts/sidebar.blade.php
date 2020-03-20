

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Trivia <sup>app</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <strong>Dashboard</strong></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
     

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('question.index')}}" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <strong>Question Module</strong>
        </a>
        
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('answer.index')}}" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <strong>Answer Module</strong>
        </a>

        
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('blog.index')}}" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <strong>Blog</strong>
        </a>
        
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('advertise.index')}}" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-chart-area"></i>
          <strong>Advertisement</strong>
        </a>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <strong>User Listing</strong>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

     
    </ul>
    <!-- End of Sidebar -->
  </div>