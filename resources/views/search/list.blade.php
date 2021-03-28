@extends('layouts.list_layout')
@section('title', '検索ページ')
@section('content')
<div class="content-wrapper" id="js-tab">
    <div class="tab-nav flex">
        <div class="flex list-nav">
            <div class="tab-nav__item" data-nav="0">対戦相手を募集</div>
            <div class="tab-nav__item" data-nav="1">助っ人を募集</div>
        </div>
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
        <div class="tab-content__item" data-content="0">
            <div class="grid">
                @foreach($opponents as $opponent)
                <div class="recruit-wrapper flex-column">
                    <div class="recruit-img_wrapper">
                        @if( $opponent->getImage() !== NULL )
                            <img class="recruit-img" src="{{ Storage::url($opponent->getImage()) }}">
                        @else
                            <img class="recruit-img" src="/images/profile_img.svg">
                        @endif
                        <div class="recruit-calender flex-column">
                            <div class="recruit-calender_year">{{ date("Y", strtotime($opponent['game_day'])) }}</div>
                            <div class="recruit-calender_date">{{ date("n/j", strtotime($opponent['game_day'])) }}</div>
                            <div class="recruit-calender_day">{{ $weekday[date("w", strtotime($opponent['game_day']))] }}</div>
                        </div>
                    </div>
                    <div class="recruit-content_wrapper">
                        <table class="recruit-table">
                            <tr class="recruit-table_row">
                                <th class="recruit-table_header">試合時間</th>
                                <td class="recruit-table_data">&nbsp;{{ date("G:i", strtotime($opponent['start_time'])) . '~' . date("G:i", strtotime($opponent['end_time']))}}</td>
                            </tr>
                            <tr class="recruit-table_row">
                                <th class="recruit-table_header">試合場所</th>
                                @isset($opponent -> game_place)
                                <td class="recruit-table_data">&nbsp;{{ $opponent -> game_place }}</td>
                                @else
                                <td class="recruit-table_data">未定</td>
                                @endisset
                            </tr>
                            <tr class="recruit-table_row">
                                <th class="recruit-table_header">&nbsp;チーム&nbsp;</th>
                                <td class="recruit-table_data">&nbsp;{{ $opponent -> getName() }}（{{ $opponent -> getAddress() }})</td>
                            </tr>
                        </table>
                        <div class="recruit-detail">
                            <a class="button" href="/user/{{ $opponent -> id }}/{{ $opponent -> user_id }}" style="padding: 6px 12px;">詳細</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-content__item" data-content="1">
            <div class="grid">
                @foreach($helpers as $helper)
                <div class="recruit-wrapper flex-column">
                    <div class="recruit-img_wrapper">
                        @if( $helper->getImage() !== NULL )
                            <img class="recruit-img" src="{{ Storage::url($helper->getImage()) }}">
                        @else
                            <img class="recruit-img" src="/images/profile_img.svg">
                        @endif
                        <div class="recruit-calender flex-column">
                            <div class="recruit-calender_year">{{ date("Y", strtotime($helper['game_day'])) }}</div>
                            <div class="recruit-calender_date">{{ date("n/j", strtotime($helper['game_day'])) }}</div>
                            <div class="recruit-calender_day">{{ $weekday[date("w", strtotime($helper['game_day']))] }}</div>
                        </div>
                    </div>
                    <div class="recruit-content_wrapper">
                        <table class="recruit-table">
                            <tr class="recruit-table_row">
                                <th class="recruit-table_header">試合時間</th>
                                <td class="recruit-table_data">&nbsp;{{ date("G:i", strtotime($helper['start_time'])) . '~' . date("G:i", strtotime($helper['end_time']))}}</td>
                            </tr>
                            <tr class="recruit-table_row">
                                <th class="recruit-table_header">試合場所</th>
                                @isset($helper -> game_place)
                                <td class="recruit-table_data">&nbsp;{{ $helper -> game_place }}</td>
                                @else
                                <td class="recruit-table_data">未定</td>
                                @endisset
                            </tr>
                            <tr class="recruit-table_row">
                                <th class="recruit-table_header">&nbsp;チーム&nbsp;</th>
                                <td class="recruit-table_data">&nbsp;{{ $helper -> getName() }}（{{ $helper -> getAddress() }})</td>
                            </tr>
                        </table>
                        <div class="recruit-detail">
                            <a class="button" href="/user/{{ $helper -> id }}/{{ $helper -> user_id }}" style="padding: 6px 12px;">詳細</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection