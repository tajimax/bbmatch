@extends('layout')
@section('title', '検索ページ')
@section('content')
<div class="tab-wrapper">
    <div class="tab-nav flex">
        <div class="tab-nav__item active">他のユーザー</div>
    </div>
    <!-- 小説コンテンツ部分 -->
    <div class="tab-content">
        <div class="tab-content__item">
            <!-- コンテンツ部分 -->
            <div class="tab-content2 active">
                <div class="grid">
                    <div class="posted-novel flex">
                        <div class="posted-work__novel-img-wrapper">
                            <img class="posted-work__img" src="#">
                        </div>
                        <div class="posted-work__novel-content-wrapper">
                            <a class="posted-work__ttl" href="#">{{ $item -> name }}</a>
                            <a class="posted-work__genre" href="#">{{ $item -> address }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection