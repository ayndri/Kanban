<div class="app-menu navbar-menu py-3" id="sidebar">
    <div class="navbar-brand-box">

        <!-- Dummy Logo -->
        <a href="{{ route('home') }}" class="logo d-flex align-items-center gap-2 px-3">
            <!-- Small Logo -->
            <span class="logo-sm d-flex align-items-center justify-content-center">
                <div class="rounded-circle d-flex align-items-center justify-content-center"
                    style="width:40px;height:40px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;font-weight:700;">
                    D
                </div>
            </span>

            <!-- Large Logo -->
            <span class="logo-lg d-flex align-items-center gap-2">

                <span style="font-weight:700;font-size:16px;color:#fff;">
                    DemoApp
                </span>
            </span>


        </a>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title">
                    <span>UTAMA</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('tasks.*') ? 'active' : '' }}"
                        href="{{ route('tasks.index') }}">
                        <i class="ri-task-line"></i>
                        <span>Tasks</span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>PENGATURAN</span>
                </li>

                {{-- Admin Only --}}
                @if(Auth::check() && Auth::user()->role && Auth::user()->role->name == 'admin')

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('employees.*') ? 'active' : '' }}"
                        href="{{ route('employees.index') }}">
                        <i class="ri-group-line"></i>
                        <span>Data Karyawan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('divisions.*') ? 'active' : '' }}"
                        href="{{ route('divisions.index') }}">
                        <i class="ri-building-line"></i>
                        <span>Data Divisi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('roles.*') ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">
                        <i class="ri-shield-user-line"></i>
                        <span>User Roles</span>
                    </a>
                </li>

                @endif

            </ul>
        </div>
    </div>
</div>