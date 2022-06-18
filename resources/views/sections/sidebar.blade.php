  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Decafe</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(request()->routeIs('dashboard')) active @endif">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menu
    </div>

    <!-- Nav Item - Categories -->
    <li class="nav-item @if(request()->routeIs('category.*')) active @endif">
      <a class="nav-link" href="{{ route('category.index') }}">
        <i class="fas fa-grip-horizontal"></i>
        <span>Categories</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item @if(request()->routeIs('menu.*')) active @endif">
      <a class="nav-link collapsed" href="google.com" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-utensils"></i>
          <span>Menus</span></a>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded" id="navCategories">
              <h6 class="collapse-header">Menu Categories:</h6>
          </div>
      </div>
  </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      Orders
    </div>

    <!-- Nav Item - Categories -->
    <li class="nav-item @if(request()->routeIs('order.*')) active @endif">
      <a class="nav-link" href="{{ route('order.index') }}">
        <i class="fas fa-concierge-bell"></i>
        <span>Orders</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if(request()->routeIs('transaction.*')) active @endif">
      <a class="nav-link" href="{{ route('transaction.index') }}">
        <i class="fas fa-receipt"></i>
        <span>Transactions</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      Others
    </div>

    <!-- Nav Item - Categories -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-coins"></i>
        <span>Expenses</span></a>
    </li>

    <!-- Nav Item - Categories -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-users"></i>
        <span>Users</span></a>
    </li>

    <!-- Nav Item - Categories -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-cog"></i>
        <span>Settings</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
