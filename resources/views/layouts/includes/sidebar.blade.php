
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>

            <li>
                <a href="{{ route('home') }}" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboards">Dashboard</span>
                </a>
            </li>

          @if (in_array(auth()->user()->role, [5]))
            <li>
                <a href="#" class="has-arrow waves-effect">
                    <i class="bx bx-user-circle"></i>
                    <span key="t-users">Users</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('users.list') }}" key="t-create-user">Users List</a></li>
                </ul>
            </li>
          @endif

            <li>
                <a href="#" class="has-arrow waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span key="t-crypto">Lessons Learned</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('lessons.index') }}" key="t-lesson-learned-list">Lesson Leaned List</a></li>
                </ul>
            </li>

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-envelope"></i>
                    <span key="t-email">Email</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="email-inbox.html" key="t-inbox">Inbox</a></li>
                    <li><a href="email-read.html" key="t-read-email">Read Email</a></li>
                    <li>
                        <a href="javascript: void(0);">
                            <span class="badge rounded-pill badge-soft-success float-end" key="t-new">New</span>
                            <span key="t-email-templates">Templates</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="email-template-basic.html" key="t-basic-action">Basic Action</a></li>
                            <li><a href="email-template-alert.html" key="t-alert-email">Alert Email</a></li>
                            <li><a href="email-template-billing.html" key="t-bill-email">Billing Email</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}

            <li class="mm">
                <a  class="waves-effect" href="{{ route('logout') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="bx bx-power-off"></i>
                    <span key="t-chat">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>



        </ul>
    </div>



