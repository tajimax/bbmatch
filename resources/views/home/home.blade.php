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
                    <img class="profile" src="/images/profile_img.svg" alt="">
                @endif
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
            <div class="content-item" id="js-tab">
                <ul class="tab-nav flex">
                    <li class="tab-nav__item recruit-nav" data-nav="0">募集状況</li>
                    <li class="tab-nav__item recruit-nav" data-nav="1">対戦相手募集</li>
                    <li class="tab-nav__item recruit-nav" data-nav="2">助っ人募集</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-content__item flex" data-content="0">
                        <table class="schedule_table">
                            <tr>
                                <th class="schedule_header">カテゴリ</th>
                                <th class="schedule_header">日程</th>
                                <th class="schedule_header">開始時間</th>
                                <th class="schedule_header">終了時間</th>
                                <th class="schedule_header">場所</th>
                                <th class="schedule_header">応募チーム数</th>
                            </tr>
                            @foreach($recruits as $recruit)
                            <tr>
                                <td class="schedule_data">
                                    @if( $recruit->category === 'opponent' )
                                    対戦相手
                                    @else
                                    助っ人
                                    @endif
                                </td>
                                <td class="schedule_data">{{ $recruit['game_day'] }}</td>
                                <td class="schedule_data"><?php echo date("H:i", strtotime($recruit['start_time'])) ?></td>
                                <td class="schedule_data"><?php echo date("H:i", strtotime($recruit['end_time'])) ?></td>
                                <td class="schedule_data">{{ $recruit['game_place'] }}</td>
                                <td class="schedule_data"><a href="home/chat/{{ $recruit['id'] }}">{{ $recruit['msg_user_count'] }}</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-content__item" data-content="1">
                        <form action="{{ route('recruit') }}" method="post">
                            @csrf
                            <table class="schedule_table">
                                <tr>
                                    <th class="schedule_header">日程</th>
                                    <th class="schedule_header">開始時間</th>
                                    <th class="schedule_header">終了時間</th>
                                    <th class="schedule_header">場所</th>
                                </tr>
                                <tr>
                                    <td class="schedule_data"><input id="game_day" class="recruit-item" type="date" name="game_day"></td>
                                    <td class="schedule_data"><input id="start_time" class="recruit-item" type="time" name="start_time"></td>
                                    <td class="schedule_data"><input id="end_time" class="recruit-item" type="time" name="end_time"></td>
                                    <td class="schedule_data"><input id="game_place" class="recruit-item" type="text" name="game_place" placeholder="試合場所"></td>
                                </tr>
                            </table>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <textarea name="note" id="" cols="6" rows="6" class="recruit-note" placeholder="備考"></textarea>
                            <input type="hidden" name="category" value="opponent">
                            <input class="profile-edit" type="submit" value="募集する">
                        </form>
                    </div>
                    <div class="tab-content__item" data-content="2">
                        <form action="{{ route('recruit') }}" method="post">
                            @csrf
                            <table class="schedule_table">
                                <tr>
                                    <th class="schedule_header">日程</th>
                                    <th class="schedule_header">開始時間</th>
                                    <th class="schedule_header">終了時間</th>
                                    <th class="schedule_header">場所</th>
                                </tr>
                                <tr>
                                    <td class="schedule_data"><input id="game_day" class="recruit-item" type="date" name="game_day"></td>
                                    <td class="schedule_data"><input id="start_time" class="recruit-item" type="time" name="start_time"></td>
                                    <td class="schedule_data"><input id="end_time" class="recruit-item" type="time" name="end_time"></td>
                                    <td class="schedule_data"><input id="game_place" class="recruit-item" type="text" name="game_place" placeholder="試合場所"></td>
                                </tr>
                            </table>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <textarea name="note" id="" cols="6" rows="10" class="recruit-note" placeholder="備考"></textarea>
                            <input type="hidden" name="category" value="helper">
                            <input class="profile-edit" type="submit" value="募集する">
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-item">
                <div class="news__wrapper">
                    <h2 class="section__title"><span>応募中一覧</span></h2>
                    <table class="schedule_table">
                        <tr>
                            <th class="schedule_header">カテゴリ</th>
                            <th class="schedule_header">チーム名</th>
                            <th class="schedule_header">日程</th>
                            <th class="schedule_header">開始時間</th>
                            <th class="schedule_header">終了時間</th>
                            <th class="schedule_header">場所</th>
                        </tr>
                        @foreach($applications as $application)
                        <tr>
                            <td class="schedule_data">
                                @if( $application->getCategory() === 'opponent' )
                                対戦相手
                                @else
                                助っ人
                                @endif
                            </td>
                            <td class="schedule_data">{{ $application->getReceiveName() }}</td>
                            <td class="schedule_data">{{ $application->getGameDay() }}</td>
                            <td class="schedule_data">{{ $application->getStartTime() }}</td>
                            <td class="schedule_data">{{ $application->getEndTime() }}</td>
                            <td class="schedule_data">{{ $application->getGamePlace() }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection