<div class="menu">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-home">
                <i class="fa fa-home"></i>
                Домашняя страница
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/nearby') }}" class="menu-nearby">
                <i class="fa fa-map-marker"></i>
                По близости
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/community') }}" class="menu-nearby">
                <i class="fa fa-group"></i>
                Сообщества
            </a>
        </li>
        {{-- <li class="list-group-item">
            <a href="{{ url('/groups') }}" class="menu-groups">
                <i class="fa fa-users"></i>
                Группы
            </a>
        </li> --}}
        <li class="list-group-item">
            <a href="{{ url('/direct-messages') }}" class="menu-dm">
                <i class="fa fa-commenting"></i>
                Чат сообщений
            </a>
        </li>
    </ul>
</div>
