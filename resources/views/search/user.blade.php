@extends('layout')
@section('title', '検索ページ')
@section('content')
<div class="tab-wrapper">
    <!-- 小説コンテンツ部分 -->
        <div class="field">
            <img class="diamond" src="/images/field.jpg" alt="">
            <img class="P position" src="/images/symbol.png" alt="">
            <img class="C position" src="/images/symbol.png" alt="">
            <img class="FB position" src="/images/symbol.png" alt="">
            <img class="SB position" src="/images/symbol.png" alt="">
            <img class="TB position" src="/images/symbol.png" alt="">
            <img class="SS position" src="/images/symbol.png" alt="">
            <img class="LF position" src="/images/symbol.png" alt="">
            <img class="CF position" src="/images/symbol.png" alt="">
            <img class="RF position" src="/images/symbol.png" alt="">
            <div class="grid">
                <button class="btn">投手</button>
                <button class="btn">捕手</button>
                <button class="btn">一塁手</button>
                <button class="btn">二塁手</button>
                <button class="btn">三塁手</button>
                <button class="btn">遊撃手</button>
                <button class="btn">左翼手</button>
                <button class="btn">中翼手</button>
                <button class="btn">右翼手  </button>
                <button class="btn">全選択</button>
            </div>
        </div>
        <img src="/images/calendar.png" alt="">
</div>
@endsection