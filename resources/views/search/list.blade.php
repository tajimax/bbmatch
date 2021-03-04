@extends('layouts.layout')
@section('title', '検索ページ')
@section('content')
<div class="tab-wrapper">
    <div class="tab-nav flex">
        <div class="tab-nav__item">チーム一覧</div>
        <div class="tab-nav__item">
            <p class="menu js-menu">条件で絞り込む</p>
            <div class="contents">                
                <div class="flex">
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
                </div>
            </div>
        </div>
    </div>
    <!-- 小説コンテンツ部分 -->
    <div class="tab-content">
        <div class="tab-content__item">
            <!-- コンテンツ部分 -->
            <div class="tab-content2 active">
                <div class="grid">
                    @foreach($items as $item)
                    <div class="team flex-column">
                        <div class="team-img-wrapper">
                            <img class="team__img" src="/images/profile.jpeg">
                        </div>
                        <div class="team-content-wrapper">
                            <a class="team__ttl" href="{{ route('user',['id' => $item->user_id, 'date' => $item->date]) }}">{{ $item -> name }}</a>
                            <a class="team__genre" href="#">{{ $item -> address }}</a>
                            <a class="team__genre" href="#">{{ $item -> date }}</a>
                            <a class="team__genre" href="#">{{ $item -> member }}人</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection