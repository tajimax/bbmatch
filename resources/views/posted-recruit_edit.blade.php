<h2 class="section__title">試合詳細</h2>
@auth
<form action="#" method="post">
    @csrf
    <table class="schedule_table">
        <tr>
            <th class="schedule_header">募集カテゴリ</th>
            <th class="schedule_header">日程</th>
            <th class="schedule_header">試合時間</th>
            <th class="schedule_header">試合場所</th>
        </tr>
        <tr>
            <td class="schedule_data">
                <select type="text" class="form-input" name="category">
                    <option value="">選択してください</option>
                    <option value="opponent">対戦相手を募集</option>
                    <option value="helper">助っ人を募集</option>
                </select>
            </td>
            @error('category')
                <p class="caution">{{$message}}</p>
            @enderror
            <td class="schedule_data"><input id="date" type="date" class="form-input" type="date" name="game_day" min="{{ date('Y-m-d', strtotime('1 day')) }}"  value="{{ old('game_day') }}"></td>
            <td class="schedule_data"><input id="start_time" class="form-input-date" type="time" name="start_time" value="{{ old('start_time') }}">~<input id="end_time" class="form-input-date" type="time" name="end_time" value="{{ old('end_time') }}"></td>
            <td class="schedule_data"><input id="recruit_place" class="form-input" type="text" name="recruit_place" placeholder="任意"  value="{{ old('game_place') }}"></td>
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
    <textarea name="note" id="" cols="6" rows="6" class="recruit-note" placeholder="備考" value="{{ old('note') }}"></textarea>
</form>