@extends('layouts.layout')
@section('title', '検索ページ')
@section('content')
<div class="content-wrapper">
    <div class="content-header flex">
        <div class="content-ttl">対戦相手を募集</div>
        <div class="content-ttl">助っ人を募集</div>
        <div class="content-ttl">メンバーを募集</div>
        <div class="content-search">
            <p class="menu js-menu">条件で絞り込む</p>
            <div class="contents">                
                <div class="flex-column">
                    <form class="search_container" action="{{ route('member') }}" method="post">
                        @csrf
                        <input type="number" name="member" placeholder="  人数で検索">
                        <input type="submit" value="&#xf002">
                    </form>
                    <form class="search_container" action="{{ route('date') }}" method="post">
                        @csrf
                        <input type="date" name="date" placeholder="  日付で検索">
                        <input type="submit" value="&#xf002">
                    </form>
                    <form class="search_container" action="#" method="post">
                        @csrf
                        <input type="where" name="text" placeholder="地域で検索">
                        <input type="submit" value="&#xf002">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- コンテンツ部分 -->
    <div class="content-item">
        <div class="grid">
            @foreach($items as $item)
            <div class="team flex-column">
                <div class="team-img-wrapper">
                    <img class="team__img" src="">
                </div>
                <div class="team-content-wrapper">
                    <a class="team__ttl" href="{{ route('user',['id' => $item->user_id, 'date' => $item->date]) }}">{{ $item -> name }}</a>
                    <a class="team__address" href="#">{{ $item -> address }}</a>
                    <a class="team__date" href="#">{{ $item -> date }}</a>
                    <a class="team__member" href="#">{{ $item -> member }}人</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection