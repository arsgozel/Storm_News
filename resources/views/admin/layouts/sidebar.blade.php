<div class="d-flex flex-column flex-shrink-0 col-md-3 col-lg-2 d-md-block bg-light border-end sidebar collapse" style="width: 226px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link link-dark pt-4">
                <i class="bi bi-speedometer text-danger"></i>
                @lang('app.dashboard')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.news.index') }}" class="nav-link link-dark">
                <i class="bi bi-hdd-stack-fill text-danger"></i>
                @lang('app.apps')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}" class="nav-link link-dark">
                <i class="bi bi-bookmarks-fill text-danger"></i>
                @lang('app.types')
            </a>
        </li>

        <li>
            <a href="{{ route('admin.contacts.index') }}" class="nav-link link-dark">
                <i class="bi bi-envelope-fill text-danger"></i>
                @lang('app.contacts')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link link-dark">
                <i class="bi bi-person-bounding-box text-danger"></i>
                @lang('app.managers')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.visitors.index') }}" class="nav-link link-dark">
                <i class="bi bi-people-fill text-danger"></i>
                @lang('app.visitors')
            </a>
        </li>
    </ul>
</div>