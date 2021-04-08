<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>募集一覧</title>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!----- ヘッダー部分 ----->
<header class="header flex">
    @include('header')
</header>


<!----- 投稿一覧 ----->
<section class="section-wrapper">
    <div class="commonInner flex-column">
        <div class="content-wrapper" id="js-tab">
            <div class="tab-nav flex">
                <div class="flex list-nav">
                    <div class="tab-nav__item" data-nav="0">対戦相手を募集</div>
                    <div class="tab-nav__item" data-nav="1">助っ人を募集</div>
                </div>
                <div class="btn-wrapper flex">
                    <div class="btn js-menu">条件で絞り込む</div>
                    <form class="contents flex-column" action="{{ route('searchByAddressDate') }}" method="post">
                        @csrf
                        <input class="search_container" type="date" name="date" placeholder="  日付で検索">
                        <select class="search_container" name="address" type="text">
                            <option value="">地域で検索</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                        <input class="search_container btn-grn" type="submit" value="検索">
                    </form>
                    <a href="{{ route('showSearchRecruit') }}" class="btn">検索条件をクリア</a>
                </div>
            </div>
            <div class="gest-only-display-form">
                <form action="{{ route('searchGest') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="7">
                    <input class="gest-only-display" type="submit" value="ゲスト２の投稿のみ表示">
                </form>
                <form action="{{ route('searchGest') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="6">
                    <input class="gest-only-display" type="submit" value="ゲスト1の投稿のみ表示">
                </form>
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
                                        <td class="recruit-table_data"><i style="color:#999;">&nbsp;未定</i></td>
                                        @endisset
                                    </tr>
                                    <tr class="recruit-table_row">
                                        <th class="recruit-table_header">&nbsp;チーム&nbsp;</th>
                                        <td class="recruit-table_data">&nbsp;{{ $opponent -> getName() }}（{{ $opponent -> getAddress() }})</td>
                                    </tr>
                                </table>
                                <div class="recruit-detail">
                                    <a class="btn" href="/user/{{ $opponent -> id }}/{{ $opponent -> user_id }}" style="padding: 6px 12px;">詳細</a>
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
                                        <td class="recruit-table_data"><i style="color:#999;">&nbsp;未定</i></td>
                                        @endisset
                                    </tr>
                                    <tr class="recruit-table_row">
                                        <th class="recruit-table_header">&nbsp;チーム&nbsp;</th>
                                        <td class="recruit-table_data">&nbsp;{{ $helper -> getName() }}（{{ $helper -> getAddress() }})</td>
                                    </tr>
                                </table>
                                <div class="recruit-detail">
                                    <a class="btn" href="/user/{{ $helper -> id }}/{{ $helper -> user_id }}" style="padding: 6px 12px;">詳細</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/tab.js"></script>
<script src="js/modal.js"></script>
<script>
    const menu = document.querySelectorAll(".js-menu");

    function toggle() {
    const content = this.nextElementSibling;
    this.classList.toggle("is-active");
        content.classList.toggle("is-open");
    }

    for (let i = 0; i < menu.length; i++) {
        menu[i].addEventListener("click", toggle);
    }
</script>
</body>
</html>