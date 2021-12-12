
     <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('home') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/logo.png" alt="" height="17">
                    </span>
                </a>

                <a href="{{ route('home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/logo.png" alt="" height="55">
                    </span>
                </a>
            </div>


            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
                        @if (in_array(auth()->user()->role, [0,1]))
                            <span  key="t-megamenu">Project: <strong>{{ auth()->user()->location->name }}</strong></span>
                        @endif
            </button>


        </div>

        <div class="d-flex">


           @livewire('notification-component')

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"  avatar="{{ auth()->user()->name }}">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->userGreetings() }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-shield-quarter font-size-16 align-middle me-1"></i> <span key="t-profile">{{ auth()->user()->userRole() }}</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"onclick="event.preventDefault();
                    document.getElementById('logout-form-2').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span>
                    <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                </div>
            </div>



        </div>
    </div>

    @include('layouts.includes.avatar')
