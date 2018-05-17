@include('flash')
<input type="hidden" name="chat_friend_id" value="{{ $friend->id }}">
<div class="chat-info">
    <a href="{{ url('/'.$friend->username) }}" class="user-profile">
        <img class="img-circle" src="{{ $friend->getPhoto(50, 50) }}">
        <div class="detail">
            <strong>{{ $friend->name }}</strong>
            
             {{-- check online user --}}
                {{-- {{$user->isOnline()}}
                @if($friend->id)
                     @if($user->isOnline())
                            <i class="fa fa-dot-circle-o" style = 'color:lime;'></i> online
                          @else
                            <div class="fa fa-dot-circle-o" style = 'color:red;'></div> offline
                            <div class="">last seen {{$user->last_sing_in_at}}</div>
                          @endif
                @endif --}}
                {{-- end of --}}
        </div>  
    </a>
    <a class="btn btn-default btn-xs btn-remove" onclick="deleteChat({{ $friend->id }})" data-toggle="tooltip" data-placement="bottom" title="Удалить Чат">
        <i class="fa fa-times"></i>
    </a>
    <div class="clearfix"></div>
</div>

<div class="message-list">
    @php($first_message_id = 0)
    @if($message_list->count() == 0)
        <div class="alert alert-info">
            Нету сообщений
        </div>
    @else
        @php($i=0)
        @foreach($message_list->get()->reverse() as $message)

            @include('messages.widgets.single_message')

            @if($i == 0)
                @php($first_message_id = $message->id)
            @endif
            @php($i++)
        @endforeach
    @endif
    <div class="first_message_div">
        <input type="hidden" name="first_message_id" value="{{ $first_message_id }}">
    </div>
</div>
<div class="message-write">
    <form id="form-message-write" method="GET" action="/sms">

        <input type="hidden" name="user_id" value="{{ $friend->id }}">
        <input type="hidden" name="user_phone" value="{{ $friend->phone}}">
        <input type="hidden" name="user_name" value="{{ $user->name}}">
        <input type="hidden" name="receiver_name" value="{{ $friend->name}}">
        <button class="btn btn-primary pull-right" style= "margin-top: -10px;">СМС(на телефон)</button>
       
        @if ($can_send_message)
            <textarea class="form-control area" name ='body' rows="1" placeholder="Написать сообщение" onkeyup="sendMessage(event)" value ="{{ Session::get('success') }}" id="area"></textarea>
        @else
            <div class="alert alert-danter">Вы не можете отправить сообщение этому пользователю.</div>
        @endif
    </form>
</div>