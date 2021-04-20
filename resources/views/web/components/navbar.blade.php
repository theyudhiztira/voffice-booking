<nav class="navbar navbar-expand-lg navbar-light bg-light topbar shadow sticky-top">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="https://beta.voffice.co.id/images/logo/logo.svg" class="d-inline-block align-top img img-fluid" style="max-width: 150px; min-width: 93px;" alt="vOffice Indonesia">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-light w-100" id="navbarText">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('web.pricing') }}">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('web.about') }}">About</a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            @if (\Auth::guard('client')->check())
                <li class="nav-item dropdown align-items-center d-flex">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Hi,&nbsp;<b>{{ \Auth::guard('client')->user()->first_name }}</b></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('web.home') }}" class="dropdown-item">My Account</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('web.auth.logout') }}"class="dropdown-item">Logout</a>
                    </div>
                </li>
            @else
                @if (\Request::route()->getName() != 'web.login')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.login') }}">Login</a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>
                {{-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav d-flex justify-content-between">
                        <a class="navbar-brand" href="#">
                            <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                            Bootstrap
                        </a>
                        <div class="d-flex">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link" href="{{ route('admin.logout') }}">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                                    <i class="fas fa fa-power-off"></i>
                                </a>
                            </li>
                        </div>
                        @if (\Auth::guard('client')->check())
                            <li class="nav-item no-arrow align-items-center d-flex">
                                <span class="d-flex">Hi,&nbsp;<b>{{ \Auth::user()->name }}</b></span>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link" href="{{ route('admin.logout') }}">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                                    <i class="fas fa fa-power-off"></i>
                                </a>
                            </li>
                        @else
                        @endif

                    </ul>

                </nav> --}}
