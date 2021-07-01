<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="https://vox.myvios.cloud/atmos/getting%20started/light/assets/img/icon.png" class="img w-50">
        </div>
        <div class="sidebar-brand-text mr-5">voffice</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {!! \Request::route()->getName() == 'dashboard' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {!! \Request::route()->getName() == 'user.index' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item {!! \Request::route()->getName() == 'client.index' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ route('admin.client.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Clients</span></a>
    </li>

    <li class="nav-item {!! \Request::route()->getName() == 'admin.facility.index' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ route('admin.facility.index') }}">
            <i class="fas fa-fw fa-chair"></i>
            <span>Facilities</span></a>
    </li>

    <li class="nav-item {!! \Request::route()->getName() == 'admin.location.index' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ route('admin.location.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Locations</span></a>
    </li>

    <li class="nav-item {!! \Request::route()->getName() == 'admin.order.index' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ route('admin.order.index') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Orders</span></a>
    </li>

    <li class="nav-item {!! \Request::route()->getName() == 'admin.product.index' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ route('admin.product.index') }}">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Products</span></a>
    </li>

    <li class="nav-item {!! \Request::route()->getName() == 'admin.booking.index' ? 'active' : '' !!}">
        <a class="nav-link" href="{{ route('admin.booking.index') }}">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Report</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>