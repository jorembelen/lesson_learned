<div wire:poll.visible.30s>

    <div class="dropdown main-header-notification">
        <a class="nav-link icon" href="#">
            <i class="fe fe-bell header-icons"></i>
            <span class="badge badge-danger nav-link-badge">{{ $unreadNotifications }}</span>
        </a>
        <div class="dropdown-menu">
            @if ($unreadNotifications > 0)
            <div class="header-navheading">
                <p class="main-notification-text">You have {{ $unreadNotifications }} unread notification</p>
            </div>
            @else
            <div class="header-navheading">
                <p class="main-notification-text">No new notification</p>
            </div>
            @endif
            <div class="main-notification-list">
                @foreach ($notifications as $notification)
                <a href="#" wire:click="read('{{ $notification->id }}')">
                <div class="media new">
                    <div class="main-img-user online mt-2"><i class="fa fa-bell fa-2x"></i></div>
                    <div class="media-body">
                        <p><strong>{{ $notification->data['title'] }}</strong></p>
                        <p> {{ $notification->data['data'] }}</p>
                        <span>{{ $notification->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </a>
                @endforeach
            </div>
            @if ($unreadNotifications > 0)
                <div class="dropdown-footer">
                    <a href="#" wire:click="clear">Clear All Notifications</a>
                </div>
            @endif
        </div>
    </div>


</div>
