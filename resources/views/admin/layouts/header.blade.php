<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow fixed-top bg-danger">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 bg-danger" href="{{ route('admin.dashboard') }}">@lang('app.app-name')</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav flex-row ms-auto me-md-0">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" target="_blank">
                <i class="bi bi-house text-light"></i><span class="text-light px-1">Baş sahypa</span>
            </a>
        </div>
    </div>
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3 text-white" href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                <i class="bi-box-arrow-right text-light"></i> @lang('app.logout')
            </a>
        </div>
    </div>
    <form id="logoutForm" action="{{ route('admin.logout') }}" method="post" class="d-none">
        @csrf
        @honeypot
    </form>
</header>