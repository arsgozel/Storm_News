<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-danger border-end sidebar collapse">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link link-light pt-4 mb-3">
                <i class="bi bi-speedometer text-white px-2"></i>
                @lang('app.dashboard')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.news.index') }}" class="nav-link link-light mb-3">
                <i class="bi bi-newspaper text-white px-2"></i>
                @lang('app.news')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}" class="nav-link link-light mb-3">
                <i class="bi bi-bookmark text-white px-2"></i>
                @lang('app.categories')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.highlights.index') }}" class="nav-link link-light mb-3">
                <i class="bi bi-award text-white px-2"></i>
                @lang('app.highlights')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.contacts.index') }}" class="nav-link link-light mb-3">
                <i class="bi bi-person-lines-fill text-white px-2"></i>
                @lang('app.contacts')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link link-light mb-3">
                <i class="bi bi-person-bounding-box text-white px-2"></i>
                @lang('app.users')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.visitors.index') }}" class="nav-link link-light mb-3">
                <i class="bi bi-people text-white px-2"></i>
                @lang('app.visitors')
            </a>
        </li>
    </ul>
</nav>