<h2 class="section__title">申請中の試合</h2>
@if($applys->isEmpty())
    <div class="notFound">申請中の試合はありません。</div>    
@else
    <table class="schedule_table">
        <tr>
            <th class="schedule_header">募集カテゴリ</th>
            <th class="schedule_header">チーム</th>
            <th class="schedule_header">日程</th>
            <th class="schedule_header"></th>
        </tr>
        @foreach($applys as $apply)
        <tr>
            <td class="schedule_data">
                <div class="recruit-category">
                @if( $apply->getCategory() === 'opponent' )
                <div class="recruit-category-opponent">対戦相手</div>
                @else
                <div class="recruit-category-helper">助っ人</div>
                @endif
                </div>
            </td>
            <td class="schedule_data">{{ $apply->getReceiveName() }}（{{ $apply->getReceiveAddress() }}）</td>
            <td class="schedule_data">{{ date("Y.n.j", strtotime($apply->getGameDay())) }}</td>
            <td class="schedule_data">
                <a class="" href="/home/chat/{{ $apply['recruit_id'] }}/{{ $apply['receive_user_id'] }}">トーク画面へ</a>
                @if($apply->unread_apply !== 0)
                <span class="newArrival_badge">{{ $apply->unread_apply }}</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endif