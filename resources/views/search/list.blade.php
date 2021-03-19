@extends('layouts.layout')
@section('title', '検索ページ')
@section('content')
<div class="content-wrapper" id="js-tab">
    <div class="tab-nav flex">
        <div class="tab-nav__item list-nav" data-nav="0">対戦相手を募集</div>
        <div class="tab-nav__item list-nav" data-nav="1">助っ人を募集</div>
        <div class="content-search">
            <p class="menu js-menu">条件で絞り込む</p>
            <div class="contents">                
                <div class="flex-column">
                    <form class="search_container" action="{{ route('searchByAddressDate') }}" method="post">
                        @csrf
                        <input type="date" name="date" placeholder="  日付で検索">
                        <input type="text" name="address" placeholder="地域で検索">
                        <input type="submit" value="&#xf002">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- コンテンツ部分 -->
    <div class="tab-content">
        <div class="tab-content__item content-item" data-content="0">
            <div class="grid">
                @foreach($opponents as $opponent)
                <div class="team flex-column">
                    <div class="team-img-wrapper">
                        @if( $opponent->getImage() !== NULL )
                            <img class="team__img" src="{{ Storage::url($opponent->getImage()) }}">
                        @else
                            <img class="team__img" src="/images/profile_img.svg" alt="">
                        @endif
                        <span class="team__date"><?php echo ltrim(date("m", strtotime($opponent['game_day'])), 0) . '/' . ltrim(date("d", strtotime($opponent['game_day'])), 0) ?></span>
                    </div>
                    <div class="team-content-wrapper">
                        <div class="team__name">{{ $opponent -> getName() }} </div>
                        <div class="team__address">{{ $opponent -> getAddress() }}</div>
                        <a class="recruit__detail" href="/user/{{ $opponent -> id }}/{{ $opponent -> user_id }}">詳細</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-content__item content-item" data-content="1">
            <div class="grid">
                @foreach($helpers as $helper)
                <div class="team flex-column">
                    <div class="team-img-wrapper">
                        @if( $helper->getImage() !== NULL )
                            <img class="team__img" src="{{ Storage::url($helper->getImage()) }}">
                        @else
                            <img class="profile" src="/images/" alt="">
                        @endif
                        <span class="team__date"><?php echo ltrim(date("m", strtotime($helper['game_day'])), 0) . '/' . ltrim(date("d", strtotime($helper['game_day'])), 0) ?></span>
                    </div>
                    <div class="team-content-wrapper">
                        <div class="team__name">{{ $helper -> getName() }} </div>
                        <div class="team__address">{{ $helper -> getAddress() }}</div>
                        <a class="recruit__detail" href="/user/{{ $helper -> id }}/{{ $helper -> user_id }}">詳細</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection