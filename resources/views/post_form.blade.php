@extends('layouts.app')
@section('title', '新規投稿')

@section('content')
<div class="section-wrapper">
    <div class="form-wrapper">
        <div class="form-header">{{ __('新規投稿') }}</div>
        @auth
        <div class="form-content">
            <form action="{{ route('store_recruit') }}" method="post">
                @csrf
                <div>
                    <div class="flex form-item">
                        <label class="form-label">カテゴリ</label>
                        <select type="text" class="form-input" name="category">
                            <option value="">選択してください</option>
                            <option value="opponent">対戦相手を募集</option>
                            <option value="helper">助っ人を募集</option>
                        </select>
                    </div>
                    @error('category')
                        {{$message}}
                    @enderror
                    <div class="flex form-item">
                        <label for="date" class="form-label">日程</label>
                        <input id="date" type="date" class="form-input" type="date" name="game_day" min="{{ date('Y-m-d', strtotime('1 day')) }}"  value="{{ old('game_day') }}">
                    </div>
                    @error('game_day')
                        {{$message}}
                    @enderror
                    <div class="flex form-item">
                        <label class="form-label">開始時間</label>
                        <div class="flex" style="width:300px;">
                            <input id="start_time" class="form-input-date" type="time" name="start_time" value="{{ old('start_time') }}">~<input id="end_time" class="form-input-date" type="time" name="end_time" value="{{ old('end_time') }}">
                        </div>
                    </div>
                    @error('start_time')
                        {{$message}}
                    @enderror
                    <div class="flex form-item">
                        <label class="form-label">試合場所</label>
                        <input id="recruit_place" class="form-input" type="text" name="recruit_place" placeholder="試合場所"  value="{{ old('game_place') }}">
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <textarea name="note" id="" cols="6" rows="6" class="recruit-note" placeholder="備考" value="{{ old('note') }}"></textarea>
                <div class="btn-wrapper flex">
                    <input class="button" type="submit" value="募集する">
                    <a class="button" href="javascript:history.back()">キャンセル</a>
                </div>
            </form>
            @else
                <h2 class="login-check" style="color:red; margin:0 auto;">※新規投稿するには、ログインしてください。</h2>
                <div class="btn-wrapper flex">
                    <a class="button" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    <a class="button" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
