
      <!-- Main Header-->
      <div class="main-header side-header sticky">
        <div class="container-fluid">
            <div class="main-header-left">
                <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
                <div class="deskContent">
                        @if (in_array(auth()->user()->role, [0,1]))
                        <span  key="t-megamenu">Project: <strong>{{ auth()->user()->location->name }}</strong></span>
                        @endif
                </div>
            </div>
            <div class="main-header-center">
                <div class="responsive-logo phoneContent">
                    @if (in_array(auth()->user()->role, [0,1]))
                    <a href="/"><span  key="t-megamenu">Project: <strong>{{ auth()->user()->location->name }}</strong></span></a>
                    @else
                    <a href="/"><img src="/assets/img/logo.png" width="125" class="mobile-logo" alt="logo"></a>
                    <a href="/"><img src="/assets/img/logo.png" width="125" class="mobile-logo-dark" alt="logo"></a>

                    @endif
                </div>
            </div>
            <div class="main-header-right">


                @livewire('notification-component')


                <div class="dropdown main-profile-menu">
                    <a class="d-flex" href="#">
                        <span class="main-img-user" >
                            <img class="round" width="60" height="60" avatar="{{ auth()->user()->name }}">
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title">{{ auth()->user()->userRole() }}</h6>
                        </div>
                        <a class="dropdown-item border-top" href="#">
                            <i class="fe fe-user"></i> {{ auth()->user()->userGreetings() }}
                        </a>
                        <a  class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fe fe-power"></i> Sign Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button><!-- Navresponsive closed -->
            </div>
        </div>
    </div>
    <!-- End Main Header-->

    @include('layouts.includes.avatar')
