<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 text-md">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.home') }}" class="brand-link"
        style="background-image: url('{{ asset('images/logo.svg') }}'); background-size: cover; background-position: center center; background-color: #343a40;">&nbsp;
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @auth
                    <li class="nav-item">
                        @if (auth()->user()->can('dashboard.home'))
                            <a href="{{ route('dashboard.home') }}" class="nav-link {{ isRouteActive('dashboard*') }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        @else
                            <a href="#">
                                <p>Access Denied</p>
                            </a>
                        @endif
                    </li>

                    @if (auth()->user()->can('profile.show'))
                        <li class="nav-item">
                            <a href="{{ route('profile.show') }}" class="nav-link {{ isRouteActive('profile*') }}">
                                <i class="nav-icon fa fa-user"></i>
                                <p>User Profile</p>
                            </a>
                        </li>
                    @endif

                    @hasrole('admin')
                        {{-- User Management --}}
                        <li class="nav-item {{ isMenuOpen(['users', 'roles', 'permissions']) }} mt-2">
                            <a href="#" class="nav-link">
                                <i class="fa fa-id-card nav-icon"></i>
                                <p>User Management&nbsp;<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (auth()->user()->can('users.index'))
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link {{ isRouteActive('users*') }}">
                                            <i class="fa fa-user nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                @endif
                                @if (auth()->user()->can('roles.index'))
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link {{ isRouteActive('roles*') }}">
                                            <i class="fa fa-key nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                @endif
                                @if (auth()->user()->can('permissions.index'))
                                    <li class="nav-item">
                                        <a href="{{ route('permissions.index') }}"
                                            class="nav-link {{ isRouteActive('permissions*') }}">
                                            <i class="fa fa-solid fa-user-shield nav-icon"></i>
                                            <p>Permissions</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                        {{-- System Monitoring --}}
                        <li class="nav-item {{ isMenuOpen(['logs', 'notifications']) }} mt-2">
                            <a href="#" class="nav-link">
                                <i class="fa fa-chart-line nav-icon"></i>
                                <p title="System Monitoring">Monitoring&nbsp;<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (auth()->user()->can('logs.index'))
                                    <li class="nav-item">
                                        <a href="{{ route('logs.index') }}" class="nav-link {{ isRouteActive('logs*') }}">
                                            <i class="fa fa-clipboard nav-icon"></i>
                                            <p>Logs</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endhasrole

                    {{-- @hasanyrole('admin|editor') --}}
                    {{-- Content Management --}}
                    <li class="nav-item {{ isMenuOpen(['packages', 'page1', 'page2', 'sub-page1', 'sub-page2']) }} mt-2">
                        <a href="#" class="nav-link">
                            <i class="fa fa-folder nav-icon"></i>
                            <p title="Content Management">CMS&nbsp;<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- @if (auth()->user()->can('page2.index')) --}}
                            <li class="nav-item">
                                <a href="{{ route('page2.index') }}" class="nav-link {{ isRouteActive('page1*') }}">
                                    <i class="fa fa-copy nav-icon"></i>
                                    <p title="Top Notch Destinations">Page 1</p>
                                </a>
                            </li>
                            {{-- @endif --}}

                            <li class="nav-item {{ isMenuOpen(['sub-page1', 'pag2', 'sub-pag2']) }} mt-2">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-folder nav-icon"></i>
                                    <p>Page 2&nbsp;<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    {{-- @if (auth()->user()->can('sub-pag1.index')) --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link {{ isRouteActive('sub-pag1*') }}">
                                            <i class="fa fa-file nav-icon"></i>
                                            <p>Sub Page 1</p>
                                        </a>
                                    </li>
                                    {{-- @endif --}}
                                    {{-- @if (auth()->user()->can('sub-page2.index')) --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link {{ isRouteActive('sub-page2*') }}">
                                            <i class="fas fa-file nav-icon"></i>
                                            <p>Sub Page 2</p>
                                        </a>
                                    </li>
                                    {{-- @endif --}}
                                    {{-- @if (auth()->user()->can('sub-page3.index')) --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link {{ isRouteActive('sub-page3*') }}">
                                            <i class="fa fa-file nav-icon"></i>
                                            <p>Sub Page 3</p>
                                        </a>
                                    </li>
                                    {{-- @endif --}}
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{-- @endhasanyrole --}}

                    {{-- @hasrole('admin') --}}
                    <li class="nav-item settings">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    {{-- @endhasrole --}}

                    <li class="nav-item logout">
                        <hr style="border-top: .1px solid #414141">
                        <a href="{{ route('logout') }}" class='nav-link'>
                            <i class="nav-icon fas fa-power-off text-danger"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
