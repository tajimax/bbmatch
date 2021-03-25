<div class="message-wrapper">
    <h2 class="message-header">{{$profile['name']}}</h2>
    <ul class="message-content">
    @foreach($messages as $message)
        @if($message['send_user_id'] === Auth::id())
        <div class="talk_right">
            <p>{{ $message['text'] }}</p>
        </div>
        @else
        <div class="talk_left">
            @if( $message->getImage() !== NULL )
                <img class="msg-icon" src="{{ Storage::url($message->getImage()) }}" alt="">
            @else
                <img class="msg-icon" src="/images/profile_img.svg" alt="">
            @endif
            <p>{{ $message['text'] }}</p>
        </div>
        @endif
    @endforeach
    </ul>
    <form class="message-reply-form" action="{{ route('reply_msg') }}" method="post">
        @csrf
        <input type="hidden" name="recruit_id" value="{{ $recruit->id }}">
        <input type="hidden" name="send_user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="receive_user_id" value="{{ $message_user_id }}">
        <textarea class="message-form" name="text" id="" cols="30" rows="2" placeholder="メッセージを入力"></textarea>
        <div class="btn-wrapper flex" style="margin:5px 0 0 auto; width:210px;">
            <input class="button" type="submit" value="送信">
        </div>
        @error('text')
            <div>{{ $message }}</div>
        @enderror
    </form>
</div>