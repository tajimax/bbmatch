@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
    <div class="commonInner">
        <div class="content-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="content-item">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if( $item['file_path'] !== NULL )
                    <div id="preview" class="profile"><img id="profileImage" class="profile" src="{{ Storage::url($item->file_path) }}"/></div>
                @else
                    <div id="preview" class="profile"><img id="profileImage" class="profile" src="/images/profile.jpeg" alt=""></div>
                @endif
            </div>
            <div class="content-item" id="js-tab">
                <ul class="tab-nav flex">
                    <li class="tab-nav__item" data-nav="0">募集状況</li>
                    <li class="tab-nav__item" data-nav="1">対戦相手募集</li>
                    <li class="tab-nav__item" data-nav="2">助っ人募集</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-content__item flex" data-content="0">
                        <div class="schedule-wrapper">
                            <div></div>
                            <div class="calendar-wrapper">
                                <div class="calender-btn-wrapper">
                                    <button id="prev" type="button">前月</button>
                                    <button id="next" type="button">次月</button>
                                </div>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__item" data-content="1">
                        <form action="{{ route('opponent') }}" method="post">
                            @csrf
                            <div class="flex">
                                <input type="date" name="game_day" placeholder="開催日" style="width:25%;">
                                <input type="time" name="start_time" placeholder="開始時間" style="width:25%;">
                                <input type="time" name="end_time" placeholder="終了時間" style="width:25%;">
                                <input type="text" name="game_place" placeholder="試合場所（グラウンド名など）" style="width:25%;">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </div>
                            <textarea name="note" id="" cols="6" rows="10" style="width:90%;">備考</textarea>
                            <input type="submit" value="募集する">
                        </form>
                    </div>
                    <div class="tab-content__item" data-content="2">
                        <form action="{{ route('helper') }}" method="post">
                            @csrf
                            <div class="flex">
                                <input type="date" name="game_day" placeholder="開催日" style="width:25%;">
                                <input type="time" name="start_time" placeholder="開始時間" style="width:25%;">
                                <input type="time" name="end_time" placeholder="終了時間" style="width:25%;">
                                <input type="text" name="game_place" placeholder="試合場所（グラウンド名など）" style="width:25%;">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }};">
                            </div>
                            <textarea name="note" id="" cols="6" rows="10" style="width:90%;">備考</textarea>
                            <input type="submit" value="募集する">
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-item">
                <form action="{{ route('update') }}" method="post" class="profile-wrapper" enctype="multipart/form-data">
                    @csrf
                    <label for="img-select" class="fas fa-camera"></label>
                    <input id="img-select" class="img-select" type="file" name="image" accept="image/png, image/jpeg, image/jpg" onChange="imgPreView(event)">
                    <input class="profile-name" name="name" type="text" value="  {{ $item->name }}">
                    @if ($errors->has('name'))
                        <div>{{ $errors->first('name') }}</div>
                    @endif
                    <div class="profile-btn flex">
                        <a href="{{ route('home') }}" class="profile-edit">キャンセル</a>
                        <input type="submit" value="更新" class="profile-edit">
                    </div>
                    <input class="profile-address" name="address" id="input" type="text" value="  {{ $item->address }}">
                    @if ($errors->has('address'))
                        <div>{{ $errors->first('address') }}</div>
                    @endif
                    <textarea class="profile-intro" name="introduction" id="" cols="30" rows="6">{{ $item->introduction }}</textarea>
                    @if ($errors->has('introduction'))
                        <div>{{ $errors->first('introduction') }}</div>
                    @endif
                    <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
                </form>
            </div>
            <div class="content-item">
                <!-- 本当はgoogleapi使っておすすめの球場を表示したい -->
                他のチーム一覧をスライダーで実装
            </div>
        </div>
    </div>
@endsection