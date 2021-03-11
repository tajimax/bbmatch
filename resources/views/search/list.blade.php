@extends('layouts.layout')
@section('title', '検索ページ')
@section('content')
<div class="content-wrapper" id="js-tab">
    <div class="tab-nav flex">
        <div class="tab-nav__item" data-nav="0">対戦相手を募集</div>
        <div class="tab-nav__item" data-nav="1">助っ人を募集</div>
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
    <div class="tab-content">
        <div class="tab-content__item" data-content="0">
            <div class="grid">
                @foreach($opponents as $opponent)
                <div class="team flex-column">
                    <div class="team-img-wrapper">
                        <img class="team__img" src="{{ Storage::url($opponent->getImage()) }}">
                    </div>
                    <div class="team-content-wrapper">
                        <a class="team__ttl" href="#">{{ $opponent -> game_day }} </a>
                        <a class="team__address" href="#">{{ $opponent -> game_place }}</a>
                        <a class="team__date" href="#">{{ $opponent -> note }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-content__item" data-content="1">
            <div class="grid">
                @foreach($helpers as $helper)
                <div class="team flex-column">
                    <div class="team-img-wrapper">
                        <img class="team__img" src="{{ Storage::url($helper->getImage()) }}">
                    </div>
                    <div class="team-content-wrapper">
                        <a class="team__ttl" href="#">{{ $helper -> game_day }} </a>
                        <a class="team__address" href="#">{{ $helper -> game_place }}</a>
                        <a class="team__date" href="#">{{ $helper -> note }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection