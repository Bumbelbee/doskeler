<div class="message @if($message->sender_user_id != $user->id){{ 'message-right' }}@endif
" id="chat-message-{{ $message->id }}">

@if($message->sender_user_id != $user->id)
    
@endif
    
    {{-- check of seen message --}}
    @if($message->seen)
        <div class="text">
            {{ $message->message }}
        </div>
    @if($message->sender_user_id == $user->id)
        <h6 style="opacity: .5;">read</h6>
        @endif
    @else
            <div class="text">
                {{ $message->message }}
            </div>
        @if($message->sender_user_id == $user->id)
         <small style="opacity: .5;">unread</small>
        @endif
    @endif 
    {{-- end of condition --}}

    <small style="margin-top: -3px;">{{ $message->created_at->format('d/m/y | H:i') }}</small>
    {{-- <a href="javascript:;" class="delete" onclick="deleteMessage({{ $message->id }})">Delete</a> --}}

        
</div>
<div class="clearfix"></div>