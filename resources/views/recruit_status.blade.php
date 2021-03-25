<h2 class="section__title">投稿中の募集</h2>
@if($recruits->isEmpty())
    <div class="notFound">投稿中の募集はありません。</div>
@else
    <table class="schedule_table">
        <tr>
            <th class="schedule_header">カテゴリ</th>
            <th class="schedule_header">日程</th>
            <th class="schedule_header">試合時間</th>
            <th class="schedule_header">場所</th>
            <th class="schedule_header"></th>
        </tr>
        @foreach($recruits as $recruit)
        <tr>
            <td class="schedule_data">
                @if( $recruit->category === 'opponent' )
                対戦相手
                @else
                助っ人
                @endif
            </td>
            <td class="schedule_data">{{ date("Y.n.j", strtotime($recruit['game_day'])) }}</td>
            <td class="schedule_data">{{ date("G:i", strtotime($recruit['start_time'])) . '~' . date("H:i", strtotime($recruit['end_time'])) }}</td>
            <td class="schedule_data">{{ $recruit['game_place'] }}</td>
            <td class="schedule_data flex">
                <form action="{{ route('delete_recruit') }}" method="post">
                    @csrf
                    <input type="hidden" name="recruit_id" value="{{ $recruit['id'] }}">
                    <input class="small-button" type="submit" value="削除">
                </form>
                <a class="small-button" href="home/chat/{{ $recruit['id'] }}">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
@endif