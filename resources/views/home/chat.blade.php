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
            <div class="content-item">
                <div class="">
                    <div class="flex">
                        <table class="schedule_table">
                            <tr>
                                <th class="schedule_header">日程</th>
                                <th class="schedule_header">開始時間</th>
                                <th class="schedule_header">終了時間</th>
                                <th class="schedule_header">場所</th>
                            </tr>
                            <tr>
                                <td class="schedule_data">{{ $recruit->game_day }}</td>
                                <td class="schedule_data"><?php echo ltrim(date("H:i", strtotime($recruit['start_time'])), '0') ?></td>
                                <td class="schedule_data"><?php echo ltrim(date("H:i", strtotime($recruit['end_time'])), '0') ?></td>
                                <td class="schedule_data">{{ $recruit->game_place }}</td>
                            </tr>
                            <tr>
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
                            </tr>
                        </table>
                    </div>
                    @if($recruit->note === NULL)
                        <div class="recruit-note">備考はありません。</div>
                    @else
                        <div class="recruit-note">{{ $recruit->note }}</div>
                    @endif
                </div>
            </div>
            <div class="content-item">
                <div class="news__wrapper">
                    <h2 class="section__title"><span>応募チーム一覧</span></h2>
                    <table class="schedule_table">
                        @foreach($message_users as $message_user)
                        <tr>
                            <td class="schedule_data">{{ $message_user->getSendName() }}</td>
                            <td class="schedule_data">{{ $message_user->getAddress() }}</td>
                            <td class="schedule_data"><a href="/home/chat/{{ $message_user['recruit_id'] }}/{{ $message_user['send_user_id'] }}">メッセージ画面へ</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection