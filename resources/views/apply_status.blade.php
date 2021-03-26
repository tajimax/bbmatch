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
                対戦相手
                @else
                助っ人
                @endif
                </div>
            </td>
            <td class="schedule_data">{{ $apply->getReceiveName() }}（{{ $apply->getReceiveAddress() }}）</td>
            <td class="schedule_data">{{ date("Y.n.j", strtotime($apply['game_day'])) }}</td>
            <td class="schedule_data">
                <a class="small-button detail-btn" href="/home/chat/{{ $apply['recruit_id'] }}/{{ $apply['receive_user_id'] }}">詳細</a>
                @if($apply->unread_apply !== 0)
                <span class="newArrival_badge">{{ $apply->unread_apply }}</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endif