<h2 class="section__title">投稿中の募集</h2>
@if($recruits->isEmpty())
    <div class="notFound">投稿中の募集はありません。</div>
@else
    <table class="schedule_table">
        <tr>
            <th class="schedule_header">募集カテゴリ</th>
            <th class="schedule_header">日程</th>
            <th class="schedule_header">試合時間</th>
            <th class="schedule_header">試合場所</th>
            <th class="schedule_header"></th>
        </tr>
        @foreach($recruits as $recruit)
        <tr>
            <td class="schedule_data">
                <div class="recruit-category">
                @if( $recruit->category === 'opponent' )
                <div class="recruit-category-opponent">対戦相手</div>
                @else
                <div class="recruit-category-helper">助っ人</div>
                @endif
                </div>
            </td>
            <td class="schedule_data">{{ date("Y.n.j", strtotime($recruit['game_day'])) }}</td>
            <td class="schedule_data">{{ date("G:i", strtotime($recruit['start_time'])) . '~' . date("H:i", strtotime($recruit['end_time'])) }}</td>
            @isset($recruit['game_place'])
            <td class="schedule_data">{{ $recruit['game_place'] }}</td>
            @else
            <td class="schedule_data"><i style="color:#999;">未定</i></td>
            @endisset
            <td class="small-btn-wrapper">
                <form action="{{ route('delete_recruit') }}" method="post">
                    @csrf
                    <input type="hidden" name="recruit_id" value="{{ $recruit['id'] }}">
                    <input class="small-btn delete-btn" type="submit" value="削除">
                </form>
                <a class="small-btn detail-btn" href="home/chat/{{ $recruit['id'] }}">
                    詳細
                    @if($recruit->unread_count !== 0)
                    <span class="newArrival_badge">{{ $recruit->unread_count }}</span>
                    @endif
                </a>
            </td>
        </tr>
        @endforeach
    </table>
@endif