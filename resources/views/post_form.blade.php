@extends('layouts.app')
@section('title', '新規投稿')

@section('content')
<div class="section-wrapper">
    <div class="form-wrapper">
        <div class="form-header">{{ __('新規投稿') }}</div>
        <div class="form-content">
            @auth
            <form action="{{ route('store_recruit') }}" method="post">
                @csrf
                <div>
                    <div class="flex-column form-item">
                        <div class="flex">
                            <label class="form-label">募集カテゴリ</label>
                            <select type="text" class="form-input" name="category">
                                <option value="">選択してください</option>
                                <option value="opponent">対戦相手を募集</option>
                                <option value="helper">助っ人を募集</option>
                            </select>
                        </div>
                        @error('category')
                            <p class="caution">※{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex-column form-item">
                        <div class="flex">
                            <label for="date" class="form-label">試合日程</label>
                            <input id="date" type="date" class="form-input" type="date" name="game_day" min="{{ date('Y-m-d', strtotime('1 day')) }}"  value="{{ old('game_day') }}">
                        </div>
                        @error('game_day')
                            <p class="caution">※{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex-column form-item">
                        <div class="flex">
                            <label class="form-label">試合時間</label>
                            <div class="flex" style="width:300px;margin-left:20px;">
                                <input id="start_time" class="form-input-date" type="time" name="start_time" value="{{ old('start_time') }}">~<input id="end_time" class="form-input-date" type="time" name="end_time" value="{{ old('end_time') }}">
                            </div>
                        </div>
                        @error('start_time')
                            <p class="caution">※{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex form-item">
                        <label class="form-label">試合場所</label>
                        <input id="recruit_place" class="form-input" type="text" name="recruit_place" placeholder="任意"  value="{{ old('game_place') }}">
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <textarea name="note" id="" cols="6" rows="6" class="recruit-note" placeholder="備考" value="{{ old('note') }}"></textarea>
                <div class="form-btn-wrapper">
                    <a class="form-btn" href="javascript:history.back()">キャンセル</a>
                    <input class="form-btn" type="submit" value="募集する">
                </div>
            </form>
            @else
                <h2 class="caution">※新規投稿するには、ログインしてください。</h2>
                <div class="form-btn-wrapper">
                    <a class="form-btn" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    <a class="form-btn" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
