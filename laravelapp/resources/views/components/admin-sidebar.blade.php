<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.category.*')) active @endif" href="{{ route('admin.category.index') }}">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>  <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin. sourses.*')) active @endif" href="{{ route('admin.sourses.index') }}">
                    <span data-feather="file"></span>
                    Источники новстей
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{route('admin.news.index')}}">
                    <span data-feather="users"></span>
                    Управление новостями
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.profile.*')) active @endif" href="{{route('admin.profile.index')}}">
                    <span data-feather="users"></span>
                     Прлфили пользователей
                </a>
            </li>
        </ul>
    </div>
</nav>
