<h2 class="section__title">試合詳細</h2>
<table class="schedule_table">
    <tr>
        <th class="schedule_header">募集カテゴリ</th>
        <th class="schedule_header">日程</th>
        <th class="schedule_header">試合時間</th>
        <th class="schedule_header">試合場所</th>
    </tr>
    <tr>
        <td class="schedule_data">
            @if( $recruit->category === 'opponent' )
            <div class="recruit-category-opponent">対戦相手</div>
            @else
            <div class="recruit-category-helper">助っ人</div>
            @endif
        </td>
        <td class="schedule_data">{{ date("Y.n.j", strtotime($recruit['game_day'])) }}</td>
        <td class="schedule_data">{{ date("H:i", strtotime($recruit['start_time'])) . '~' . date("H:i", strtotime($recruit['end_time'])) }}</td>
        @isset($recruit['game_place'])
        <td class="schedule_data">{{ $recruit['game_place'] }}</td>
        @else
        <td class="schedule_data"><i style="color:#999;">未定</i></td>
        @endisset
    </tr>
    <tr>
        <td>　</td>
        <td>　</td>
        <td>　</td>
        <td>　</td>
        <td>　</td>
    </tr>
    <tr>
        <th style="text-align:left;">　備考</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</table>
@if($recruit->note === NULL)
    <i class="recruit-note" style="color:#999;">備考はありません。</i>
@else
    <div class="recruit-note">{{ $recruit->note }}</div>
@endif