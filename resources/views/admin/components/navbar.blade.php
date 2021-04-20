
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item no-arrow align-items-center d-flex">
                            <span class="d-flex">Hi,&nbsp;<b>{{ \Auth::user()->name }}</b></span>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                                <i class="fas fa fa-power-off"></i>
                            </a>
                        </li>

                    </ul>

                </nav>
