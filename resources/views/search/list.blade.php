@extends('layouts.list_layout')
@section('title', '検索ページ')
@section('content')
<div class="content-wrapper" id="js-tab">
    <div class="tab-nav flex">
        <div class="flex" style="width:60%;">
            <div class="tab-nav__item list-nav" data-nav="0" style="width:50%;">対戦相手を募集</div>
            <div class="tab-nav__item list-nav" data-nav="1" style="width:50%;">助っ人を募集</div>
        </div>
        <div class="btn-wrapper flex">
            <div class="button" id="recruit-show">新規投稿</div>
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

    <!-- 新規投稿モーダル -->
    <div class="recruit-modal-wrapper" id="recruit-modal">
        <div class="modal">
            <div class="close-modal" id="close-recruit-modal">
                <i class="fa fa-2x fa-times"></i>
            </div>
            
            <div id="recruit-form">
                <h2>新規投稿</h2>
                @auth
                    <form action="{{ route('store_recruit') }}" method="post">
                        @csrf
                        <table>
                            <tr>
                                <th class="schedule_header">カテゴリ</th>
                                <td class="schedule_data">
                                    <select type="text" class="recruit-item" name="category">
                                        <option value="">選択してください</option>
                                        <option value="opponent">対戦相手を募集</option>
                                        <option value="helper">助っ人を募集</option>
                                    </select>
                                </td>
                            </tr>
                            @error('category')
                                {{$message}}
                            @enderror
                            <tr>
                                <th class="schedule_header">日程</th>
                                <td class="schedule_data"><input id="game_day" class="recruit-item" type="date" name="game_day"></td>
                            </tr>
                                <th class="schedule_header">開始時間</th>
                                <td class="schedule_data"><input id="start_time" class="recruit-item" type="time" name="start_time">~<input id="end_time" class="recruit-item" type="time" name="end_time"></td>
                            </tr>
                            <tr>
                                <th class="schedule_header">場所</th>
                                <td class="schedule_data"><input id="game_place" class="recruit-item" type="text" name="game_place" placeholder="試合場所"></td>
                            </tr>
                            <tr>
                                <td>　</td>
                                <td>　</td>
                                <td>　</td>
                                <td>　</td>
                                <td>　</td>
                            </tr>
                            <tr>
                                <th style="text-align:left;">　備考</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </table>
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <textarea name="note" id="" cols="6" rows="6" class="recruit-note" placeholder="備考"></textarea>
                        <div class="btn-wrapper">
                            <input class="button" type="submit" value="募集する">
                        </div>
                    </form>
                @else
                    <h2 class="login-check">※新規投稿するには、ログインしてください。</h2>
                    <div class="btn-wrapper flex">
                        <a class="button" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        <a class="button" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- コンテンツ部分 -->
    <div class="tab-content">
        @auth
            <h2 class="login-check">※{{ $auths['name'] }}でログイン中です</h2>
        @else
            <h2 class="login-check">※ログインしていません。</h2>
        @endauth
        <div class="tab-content__item content-item" data-content="0">
            <div class="grid">
                @foreach($opponents as $opponent)
                <div class="team flex-column">
                    <div class="team-img-wrapper">
                        @if( $opponent->getImage() !== NULL )
                            <img class="team__img" src="{{ Storage::url($opponent->getImage()) }}">
                        @else
                            <img class="team__img" src="/images/profile_img.svg">
                        @endif
                        <div class="game_calender flex-column">
                            <div class="game_year">{{ date("Y", strtotime($opponent['game_day'])) }}</div>
                            <div class="game_date">{{ date("n/j", strtotime($opponent['game_day'])) }}</div>
                            <div class="game_day">{{ $weekday[date("w", strtotime($opponent['game_day']))] }}</div>
                        </div>
                    </div>
                    <div class="team-content-wrapper">
                        <table class="game_table">
                            <tr class="game_table_row">
                                <th class="game_table_header">試合時間</th>
                                <td class="game_table_data">&nbsp;{{ date("G:i", strtotime($opponent['start_time'])) . '~' . date("G:i", strtotime($opponent['end_time']))}}</td>
                            </tr>
                            <tr class="game_table_row">
                                <th class="game_table_header">試合場所</th>
                                @isset($opponent -> game_place)
                                <td class="game_table_data">&nbsp;{{ $opponent -> game_place }}</td>
                                @else
                                <td class="game_table_data">未定</td>
                                @endisset
                            </tr>
                            <tr class="game_table_row">
                                <th class="game_table_header">&nbsp;チーム&nbsp;</th>
                                <td class="game_table_data">&nbsp;{{ $opponent -> getName() }}（{{ $opponent -> getAddress() }})</td>
                            </tr>
                        </table>
                        <div class="recruit_detail">
                            <a class="button" href="/user/{{ $opponent -> id }}/{{ $opponent -> user_id }}" style="padding: 6px 12px;">詳細</a>
                        </div>
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
                            <img class="team__img" src="/images/profile_img.svg">
                        @endif
                        <div class="game_calender flex-column">
                            <div class="game_year">{{ date("Y", strtotime($helper['game_day'])) }}</div>
                            <div class="game_date">{{ date("n/j", strtotime($helper['game_day'])) }}</div>
                            <div class="game_day">{{ $weekday[date("w", strtotime($helper['game_day']))] }}</div>
                        </div>
                    </div>
                    <div class="team-content-wrapper">
                        <table class="game_table">
                            <tr class="game_table_row">
                                <th class="game_table_header">試合時間</th>
                                <td class="game_table_data">&nbsp;{{ date("G:i", strtotime($helper['start_time'])) . '~' . date("G:i", strtotime($helper['end_time']))}}</td>
                            </tr>
                            <tr class="game_table_row">
                                <th class="game_table_header">試合場所</th>
                                @isset($helper -> game_place)
                                <td class="game_table_data">&nbsp;{{ $helper -> game_place }}</td>
                                @else
                                <td class="game_table_data">未定</td>
                                @endisset
                            </tr>
                            <tr class="game_table_row">
                                <th class="game_table_header">&nbsp;チーム&nbsp;</th>
                                <td class="game_table_data">&nbsp;{{ $helper -> getName() }}（{{ $helper -> getAddress() }})</td>
                            </tr>
                        </table>
                        <div class="recruit_detail">
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