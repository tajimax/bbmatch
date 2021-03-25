<div class="section__title">メッセージを送る</div>
@if(Auth::check())
    @if(Auth::id() !== $recruit['user_id'])
    <form class="message-form" action="{{ route('send_msg') }}" method="post">
        @csrf
        <input type="hidden" name="recruit_id" value="{{ $recruit->id }}">
        <input type="hidden" name="send_user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="receive_user_id" value="{{ $recruit->user_id }}">
        <textarea class="message-textarea" name="text" id="" cols="30" rows="2" placeholder="メッセージを入力"></textarea>
        <input class="button" type="submit" value="送信">
    </form>
    @else
        <div class="caution" style="color:red; margin:20px 0 0 40px">※あなたの投稿です。</div>
    @endif
@else
    <div class="caution" style="color:red; margin:20px 0 0 40px">※メッセージを送信するには、ログインしてください。</div>
@endif