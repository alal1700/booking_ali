<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name', 'Booking Platform') }}
            </a>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{route('admin.changepassword')}}" role="button"  aria-controls="navbar-dashboards">
                            <i class="ni ni-circle-08 text-primary"></i>
                            <span class="nav-link-text">{{ __('Profile') }}</span>
                        </a>                       
                    </li>
                
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{route('admin.today')}}" role="button"  aria-controls="navbar-dashboards">
                            <i class="ni ni-book-bookmark text-primary"></i>
                            <span class="nav-link-text">{{ __('Today Visits') }}</span>
                        </a>                       
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{route('admin.upcoming')}}" role="button"  aria-controls="navbar-dashboards">
                            <i class="ni ni-book-bookmark text-primary"></i>
                            <span class="nav-link-text">{{ __('Upcoming Visits') }}</span>
                        </a>                       
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{route('admin.prev')}}" role="button"  aria-controls="navbar-dashboards">
                            <i class="ni ni-book-bookmark text-primary"></i>
                            <span class="nav-link-text">{{ __('Previous Visits') }}</span>
                        </a>                       
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>