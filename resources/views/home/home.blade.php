@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
    <div class="commonInner">
        <div class="content-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                </div>
            @endif
            <div class="content-item">
                @if( $item['file_path'] !== NULL )
                    <img class="profile" src="{{ Storage::url($item->file_path) }}"/>
                @else
                    <img class="profile" src="/images/profile.jpeg" alt="">
                @endif
            </div>
            <div class="content-item" id="js-tab">
                <ul class="tab-nav flex">
                    <li class="tab-nav__item recruit-nav" data-nav="0">募集状況</li>
                    <li class="tab-nav__item recruit-nav" data-nav="1">対戦相手募集</li>
                    <li class="tab-nav__item recruit-nav" data-nav="2">助っ人募集</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-content__item flex" data-content="0">
                        <table>
                            <tr>
                                <th>日程</th>
                                <th>開始時間</th>
                                <th>終了時間</th>
                                <th>場所</th>
                            </tr>
                            @foreach($opponents as $opponent)
                            <tr>
                                <td>{{ $opponent['game_day'] }}</td>
                                <td><?php echo date("H:i", strtotime($opponent['start_time'])) ?></td>
                                <td><?php echo date("H:i", strtotime($opponent['end_time'])) ?></td>
                                <td>{{ $opponent['game_place'] }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-content__item" data-content="1">
                        <form action="{{ route('opponent') }}" method="post">
                            @csrf
                            <div class="flex">
                                <div class="flex">
                                    <label for="game_day"></label>
                                    <input id="game_day" class="recruit-item" type="date" name="game_day">
                                </div>
                                <div class="flex">
                                    <label for="start_time"></label>
                                    <input id="start_time" class="recruit-item" type="time" name="start_time">
                                </div>
                                <div class="flex">
                                    <label for="end_time"></label>
                                    <input id="end_time" class="recruit-item" type="time" name="end_time">
                                </div>
                                <div class="flex">
                                    <label for="game_place"></label>
                                    <input id="game_place" class="recruit-item" type="text" name="game_place" placeholder="試合場所">
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </div>
                            <textarea name="note" id="" cols="6" rows="10" class="recruit-note" placeholder="備考"></textarea>
                            <input class="profile-edit" type="submit" value="募集する">
                        </form>
                    </div>
                    <div class="tab-content__item" data-content="2">
                        <form action="{{ route('helper') }}" method="post">
                            @csrf
                            <div class="flex">
                                <input class="recruit-item" type="date" name="game_day">
                                <input class="recruit-item" type="time" name="start_time">
                                <input class="recruit-item" type="time" name="end_time">
                                <input class="recruit-item" type="text" name="game_place" placeholder="試合場所（グラウンド名など）">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </div>
                            <textarea name="note" id="" cols="6" rows="10" class="recruit-note" placeholder="備考"></textarea>
                            <input class="profile-edit" type="submit" value="募集する">
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-item">
                <div class="profile-wrapper">
                    <div class="profile-name"><p class="profile-item">{{ $item->name }}</p></div>
                    <div class="profile-btn">
                        <a href="{{ route('edit') }}" class="profile-edit">プロフィール編集</a>
                    </div>
                    <div class="profile-address"><p class="profile-item">{{ $item->address }}</p></div>
                    <div class="profile-intro">
                        @if( $item->introduction === NULL )
                            紹介文はありません。
                        @else
                            {{ $item->introduction }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="content-item">
                <!-- 本当はgoogleapi使っておすすめの球場を表示したい -->
                <div class="news__wrapper">
                    <h2 class="section__title"><span>お知らせ</span></h2>
                    <ul class="news-list">
                        <li class="news-list__item"><a href="#"><time datetime="2019-08-23">0000.00.00</time><span>xxxxxxxxxxxxxxxxxx</span></a></li>
                        <li class="news-list__item"><a href="#"><time datetime="2019-08-08">0000.00.00</time><span>xxxxxxxxxxxxxxxxxx</span></a></li>
                        <li class="news-list__item"><a href="#"><time datetime="2019-07-14">0000.00.00</time><span>xxxxxxxxxxxxxxxxxx</span></a></li>
                        <li class="news-list__item"><a href="#"><time datetime="2019-07-14">0000.00.00</time><span>xxxxxxxxxxxxxxxxxx</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection