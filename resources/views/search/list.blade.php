@extends('layouts.layout')
@section('title', '検索ページ')
@section('content')
<div class="content-wrapper" id="js-tab">
    <div class="tab-nav flex">
        <div class="tab-nav__item list-nav" data-nav="0">対戦相手を募集</div>
        <div class="tab-nav__item list-nav" data-nav="1">助っ人を募集</div>
        <div class="btn-wrapper flex">
            <div class="button">
                <p class="js-menu">条件で絞り込む</p>
                <form class="contents flex-column" action="{{ route('searchByAddressDate') }}" method="post">
                    @csrf
                    <input class="search_container" type="date" name="date" placeholder="  日付で検索">
                    <input class="search_container" type="text" name="address" placeholder="地域で検索">
                    <input class="search_container" type="submit" value="検索">
                </form>
            </div>
            <a href="{{ route('showSearchRecruit') }}" class="button">検索条件をクリア</a>
        </div>
    </div>
    <!-- コンテンツ部分 -->
    <div class="tab-content">
        <div class="tab-content__item content-item" data-content="0">
            <div class="big-btn">新規投稿（対戦相手を募集する）</div>
            <div class="grid">
                @foreach($opponents as $opponent)
                <div class="team flex-column">
                    <div class="team-img-wrapper">
                        @if( $opponent->getImage() !== NULL )
                            <img class="team__img" src="{{ Storage::url($opponent->getImage()) }}">
                        @else
                            <img class="team__img" src="/images/profile_img.svg" alt="">
                        @endif
                        <span class="team__date">{{ date("n/j", strtotime($opponent['game_day'])) }}</span>
                    </div>
                    <div class="team-content-wrapper">
                        <div class="recruit_item game_time">試合時間：{{ date("G:i", strtotime($opponent['start_time'])) . '~' . date("G:i", strtotime($opponent['end_time']))}} </div>
                        <div class="recruit_item game_place">試合場所：{{ $opponent -> game_place }}</div>
                        <div class="recruit_item team_data">{{ $opponent -> getName() }}（{{ $opponent -> getAddress() }}）</div>
                        <a class="recruit__detail" href="/user/{{ $opponent -> id }}/{{ $opponent -> user_id }}">詳細</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-content__item content-item" data-content="1">
            <div class="big-btn">新規投稿（助っ人を募集する）</div>
            <div class="grid">
                @foreach($helpers as $helper)
                <div class="team flex-column">
                    <div class="team-img-wrapper">
                        @if( $helper->getImage() !== NULL )
                            <img class="team__img" src="{{ Storage::url($helper->getImage()) }}">
                        @else
                            <img class="team__img" src="/images/profile_img.svg" alt="">
                        @endif
                        <span class="team__date">{{ date("n/j", strtotime($helper['game_day'])) }}</span>
                    </div>
                    <div class="team-content-wrapper">
                        <div class="recruit_item game_time">{{ date("G:i", strtotime($helper['start_time'])) . '~' . date("G:i", strtotime($helper['end_time']))}} </div>
                        <div class="recruit_item game_place">{{ $helper -> game_place }}</div>
                        <div class="recruit_item team_data">{{ $helper -> getName() }}（{{ $helper -> getAddress() }}）</div>
                        <a class="recruit__detail" href="/user/{{ $helper -> id }}/{{ $helper -> user_id }}">詳細</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection