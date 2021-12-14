<div class="mobile-main-header">
    <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <div class="d-flex order-lg-2 ml-auto">

                <div class="dropdown main-header-notification flag-dropdown">

            </div>

            <div class="mt-2">
                @livewire('notification-component')
            </div>

            <div class="dropdown main-profile-menu">
                <a class="d-flex" href="#">
                    <span class="main-img-user" ><img alt="avatar" avatar="{{ auth()->user()->name }}"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
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
            </div>
        </div>
    </div>
</div>
