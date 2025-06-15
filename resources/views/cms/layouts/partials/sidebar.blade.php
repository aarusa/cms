<div class="sidebar" data-background-color="dark">
<div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
    <a href="index.html" class="logo">
        <img
        src="{{ asset('assets/cms/img/kaiadmin/logo_light.svg') }}"
        alt="navbar brand"
        class="navbar-brand"
        height="20"
        />
    </a>
    <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
        <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
        <i class="gg-menu-left"></i>
        </button>
    </div>
    <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
    </button>
    </div>
    <!-- End Logo Header -->
</div>
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
    <ul class="nav nav-secondary">
        <li class="nav-item active">
        <a
            data-bs-toggle="collapse"
            href="#dashboard"
            class="collapsed"
            aria-expanded="false"
        >
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
        </li>
        <li class="nav-section">
            <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Modules</h4>
        </li>
        {{-- Users --}}
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#users">
                <i class="fas fa-user"></i>
                <p>Users</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="users">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="#">
                        <span class="sub-item">Add User</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="sub-item">View Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="sub-item">Add Role</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="sub-item">View Roles</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- Customer --}}
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#customers">
                <i class="fas fa-users"></i>
                <p>Customers</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="customers">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="#">
                        <span class="sub-item">Add Customer</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="sub-item">View Customer</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- Settings --}}
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#settings">
                <i class="fas fa-cog"></i>
                <p>Settings</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="#">
                        <span class="sub-item">Homepage Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="sub-item">SEO Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    </div>
</div>
</div>