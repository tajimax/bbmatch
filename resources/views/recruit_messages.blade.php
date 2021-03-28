<h2 class="section__title">応募してきているチーム</h2>
@if($message_users->isEmpty())
    <div class="notFound">応募してきているチームはありません。</div>
@else
    <table class="schedule_table">
        @foreach($message_users as $message_user)
        <tr>
            <td class="schedule_data">{{ $message_user->getSendName() }}（{{ $message_user->getAddress() }}）</td>
            <td class="schedule_data">
                <a href="/home/chat/{{ $message_user['recruit_id'] }}/{{ $message_user['send_user_id'] }}">
                トーク画面へ
                    @if($message_user->unread_count !== 0)
                    <span class="newArrival_badge">{{ $message_user->unread_count }}</span>
                    @endif
                </a>
            </td>
        </tr>
        @endforeach
    </table>
@endif