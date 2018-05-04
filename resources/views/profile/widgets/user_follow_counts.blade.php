<div class="count_widget">
    <div class="row">
        <div class="col-xs-4">
            <a class="blue" href="{{ url('/'.$user->username) }}">
                {{ $user->posts()->count() }}
            </a>
            ПОСТЫ
        </div>
        <div class="col-xs-4">
            <a class="green" href="{{ url('/'.$user->username.'/following') }}">
                {{ $user->following()->where('allow', 1)->count() }}
            </a>
            ПОДПИСКИ
        </div>
        <div class="col-xs-4">
            <a class="purple" href="{{ url('/'.$user->username.'/followers') }}">
                {{ $user->follower()->where('allow', 1)->count() }}
            </a>
            ПОДПИСЧИКИ
        </div>
    </div>
</div>
