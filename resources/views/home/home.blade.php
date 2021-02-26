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
                <img class="profile" src="/images/profile.jpeg" alt="">
            </div>
            <div class="content-item flex">
                <div class="field">
                    <form action="" method="post">
                        <input class="flatpickr schedule" type="text" readonly="readonly" value="カレンダー">
                    </form>
                    <img class="diamond" src="/images/field.jpg" alt="">
                    <img class="P position" src="/images/symbol.png" alt="" id="P">
                    <img class="C position" src="/images/symbol.png" alt=""  id="C">
                    <img class="FB position" src="/images/symbol.png" alt="" id="FB">
                    <img class="SB position" src="/images/symbol.png" alt="" id="SB">
                    <img class="TB position" src="/images/symbol.png" alt="" id="TB">
                    <img class="SS position" src="/images/symbol.png" alt="" id="SS">
                    <img class="LF position" src="/images/symbol.png" alt="" id="LF">
                    <img class="CF position" src="/images/symbol.png" alt="" id="CF">
                    <img class="RF position" src="/images/symbol.png" alt="" id="RF">
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
                <div class="group">
                    <div class="profile-item">{{ $item->team }}</div>
                    <div class="text_underline"></div>
                </div>
                <div class="group">
                    <div class="profile-item">{{ $item->address}}</div>
                    <div class="text_underline"></div>
                </div>
                <div class="profile-intro">{{ $item->introduction }}</div>
                <div class="flex">
                    <a href="{{ route('edit') }}" class="btn2">編集</a>
                </div>
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
