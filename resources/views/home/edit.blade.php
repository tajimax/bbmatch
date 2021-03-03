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
                    <form action="{{ route('SearchSchedule') }}" method="post">
                        @csrf
                        <input class="flatpickr schedule" type="text" readonly="readonly" name="date" value="{{ isset($position->date) }}">
                        <input class="btn" type="submit" value="検索">
                    </form>
                    <img class="diamond" src="/images/field.jpg" alt="">
                    <img class="P position {{ isset($position->P) }}" src="/images/symbol.png" alt="" id="P">
                    <img class="C position {{ isset($position->C) }}" src="/images/symbol.png" alt=""  id="C">
                    <img class="FB position {{ isset($position->FB) }}" src="/images/symbol.png" alt="" id="FB">
                    <img class="SB position {{ isset($position->SB) }}" src="/images/symbol.png" alt="" id="SB">
                    <img class="TB position {{ isset($position->TB) }}" src="/images/symbol.png" alt="" id="TB">
                    <img class="SS position {{ isset($position->SS) }}" src="/images/symbol.png" alt="" id="SS">
                    <img class="LF position {{ isset($position->LF) }}" src="/images/symbol.png" alt="" id="LF">
                    <img class="CF position {{ isset($position->CF) }}" src="/images/symbol.png" alt="" id="CF">
                    <img class="RF position {{ isset($position->RF) }}" src="/images/symbol.png" alt="" id="RF">
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
                        <input name="name" id="input" type="text" value="{{ $item->name }}">
                        <div class="text_underline"></div>
                    </div> 
                    @if ($errors->has('name'))
                        <div>{{ $errors->first('name') }}</div>
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
