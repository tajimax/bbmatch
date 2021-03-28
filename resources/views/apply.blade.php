<div class="section__title">メッセージを送る</div>
@if(Auth::check())
    @if(Auth::id() !== $recruit['user_id'])
    <form class="message-form flex-column" action="{{ route('reply_msg') }}" method="post">
        @csrf
        <input type="hidden" name="recruit_id" value="{{ $recruit->id }}">
        <input type="hidden" name="send_user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="receive_user_id" value="{{ $recruit->user_id }}">
        <textarea class="message-textarea" name="text" id="" cols="30" rows="2" placeholder="メッセージを入力"></textarea>
        <input class="msg-btn" type="submit" value="送信">
    </form>
    @error('text')
        <div>{{ $message }}</div>
    @enderror
    @else
        <div class="caution">※あなたの投稿です。</div>
    @endif
@else
    <div class="caution">※メッセージを送信するには、ログインしてください。</div>
@endif