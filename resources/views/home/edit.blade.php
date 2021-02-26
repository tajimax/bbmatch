@extends('layouts.homeLayout')
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
                <img class="profile" src="/images/profile.jpeg" alt="">
            </div>
            <div class="content-item flex">
                <div class="field">
                    <form action="{{ route('schedule') }}" method="post">
                        @csrf
                        <input class="flatpickr schedule" type="text" readonly="readonly" name="date" value="カレンダー">
                        <img class="diamond" src="/images/field.jpg" alt="">
                        <input class="P check" type="checkbox" name="P" value="active">
                        <input class="C check" type="checkbox" name="C" value="active">
                        <input class="FB check" type="checkbox" name="FB" value="active">
                        <input class="SB check" type="checkbox" name="SB" value="active">
                        <input class="TB check" type="checkbox" name="TB" value="active">
                        <input class="SS check" type="checkbox" name="SS" value="active">
                        <input class="LF check" type="checkbox" name="LF" value="active">
                        <input class="CF check" type="checkbox" name="CF" value="active">
                        <input class="RF check" type="checkbox" name="RF" value="active">
                        <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
                        <input type="submit" value="登録">
                    </form>
                </div>
                <div class="grid">
                    <button class="btn2" id="btn-P">投手</button>
                    <button class="btn2" id="btn-C">捕手</button>
                    <button class="btn2" id="btn-FB">一塁手</button>
                    <button class="btn2" id="btn-SB">二塁手</button>
                    <button class="btn2" id="btn-TB">三塁手</button>
                    <button class="btn2" id="btn-SS">遊撃手</button>
                    <button class="btn2" id="btn-LF">左翼手</button>
                    <button class="btn2" id="btn-CF">中翼手</button>
                    <button class="btn2" id="btn-RF">右翼手</button>
                    <button class="btn2" id="btn-ALL">全選択</button>
                </div>
            </div>
            <div class="content-item" style="padding: 0 30px 30px;">
                <form action="{{ route('update') }}" method="post">
                    @csrf
                    <div class="group">
                        <input name="team" id="input" type="text"　value="{{ $item->team }}">
                        <div class="text_underline"></div>
                    </div> 
                    @if ($errors->has('team'))
                        <div>{{ $errors->first('team') }}</div>
                    @endif
                    <div class="group">
                        <input name="address" id="input" type="text" value="{{ $item->address }}">
                        <div class="text_underline"></div>
                    </div>
                    @if ($errors->has('address'))
                        <div>{{ $errors->first('address') }}</div>
                    @endif
                    <textarea class="textarea" name="introduction" id="" cols="30" rows="6">{{ $item->introduction }}</textarea>
                    @if ($errors->has('introduction'))
                        <div>{{ $errors->first('introduction') }}</div>
                    @endif
                    <input type="hidden" name="user_id" value='{{ Auth::id() }}'>

                    <div class="flex">
                        <a href="{{ route('home') }}" class="btn2">キャンセル</a>
                        <input type="submit" value="更新" class="btn2">
                    </div>
                </form>
            </div>
            <div class="content-item">
                おすすめの球場を表示
            </div>
        </div>
    </div>

    <script>
        flatpickr('.flatpickr');
    </script>
@endsection