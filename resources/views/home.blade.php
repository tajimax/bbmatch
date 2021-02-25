@extends('homeLayout')
@section('title', 'マイページ')

@section('content')
    <div class="commonInner flex">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="">
            <input class="flatpickr" type="text" readonly="readonly" value="aaa">
        </div>
        <div class="posted-novel flex">
            <div class="field">
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
    </div>

    <script>
        flatpickr('.flatpickr');
    </script>
@endsection
