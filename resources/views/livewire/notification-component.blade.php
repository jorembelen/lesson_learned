<div wire:poll.visible.30s>

    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-bell bx-tada"></i>
            <span class="badge bg-danger rounded-pill">{{ $unreadNotifications }}</span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
            aria-labelledby="page-header-notifications-dropdown">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                    </div>
                    <div class="col-auto">
                        <a href="#!" class="small" key="t-view-all"> View All</a>
                    </div>
                </div>
            </div>
            <div data-simplebar style="max-height: 230px;">

                 @foreach ($notifications as $notification)
                <a href="{{ $notification->data['url'] }}" wire:click="read('{{ $notification->id }}')" class="text-reset notification-item">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-1" key="t-your-order">{{ $notification->data['title'] }}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1" key="t-grammer">{{ $notification->data['data'] }}</p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">{{ $notification->created_at->diffForHumans() }}</span></p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

                    {{-- @foreach ($notifications as $notification)
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-1" key="t-your-order">{{ $notification->data['title'] }}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1" key="t-grammer">{{ $notification->data['data'] }}</p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">{{ $notification->created_at->diffForHumans() }}</span></p>
                            </div>
                        </div>

                    </div>
                    @endforeach --}}

            </div>
            <div class="p-2 border-top d-grid">
                <a class="btn btn-sm btn-link font-size-14 text-center" href="#">
                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                </a>
            </div>
        </div>
    </div>


</div>
