<div class="main-sidebar main-sidebar-sticky side-menu">
        <div class="sidemenu-logo">
            <a class="main-logo" href="/">
                <img src="/assets/img/logo.png" class="header-brand-img desktop-logo" height="60" width="75" alt="logo">
                <img src="/assets/img/logo.png" class="header-brand-img icon-logo" alt="logo">
            </a>
        </div>
        <div class="main-sidebar-body">
            <ul class="nav">
                <li class="nav-header"><span class="nav-label">Dashboard</span></li>

                <li class="nav-item">
                    <a class="nav-link" href="/"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Home</span></a>
                </li>
                @if (auth()->user()->role == 5)
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Users</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{ route('users.list') }}">List</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-write sidemenu-icon"></i><span class="sidemenu-label">Lessons Learned</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{ route('lessons.index') }}">List</a>
                        </li>
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{ route('lessons.report') }}">Report</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="shape1"></span><span class="shape2"></span>
                        <i class="fe fe-log-out sidemenu-icon"></i>
                        <span class="sidemenu-label">Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            </ul>
        </div>
    </div>
