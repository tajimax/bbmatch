@extends('layouts.homeLayout')
@section('title', '〇〇さんのページ')

@section('content')
    <div class="commonInner">
        <div class="content-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="content-item">
                @if( $item->getImage() !== NULL )
                    <img class="profile" src="{{ Storage::url($item->getImage()) }}"/>
                @else
                    <img class="profile" src="/images/profile_img.svg" alt="">
                @endif
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
                                <td class="schedule_data">{{ $item->game_day }}</td>
                                <td class="schedule_data"><?php echo ltrim(date("H:i", strtotime($item['start_time'])), '0') ?></td>
                                <td class="schedule_data"><?php echo ltrim(date("H:i", strtotime($item['end_time'])), '0') ?></td>
                                <td class="schedule_data">{{ $item->game_place }}</td>
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
                    <div class="recruit-note" style="margin-top:5px;">{{ $item->note }}</div>
                </div>
                <form class="message-form" action="{{ route('send_msg') }}" method="post">
                    @csrf
                    <input type="hidden" name="recruit_id" value="{{ $item->id }}">
                    <input type="hidden" name="send_user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="receive_user_id" value="{{ $item->user_id }}">
                    <textarea class="message-textarea" name="text" id="" cols="30" rows="2" placeholder="メッセージを入力"></textarea>
                    <div class="btn-wrapper flex" style="margin:5px 0 0 auto; width:210px;">
                        <a class="button" href="#">チーム詳細</a>
                        <input class="button" type="submit" value="送信">
                    </div>
                </form>
            </div>
            <div class="content-item">
                <div class="profile-wrapper">
                    <div class="profile-name"><p class="profile-item">{{ $item->getName() }}</p></div>
                    <div class="profile-address"><p class="profile-item">{{ $item->getAddress() }}</p></div>
                    <div class="profile-intro">{{ $item->getIntro() }}</div>
                </div>
            </div>
            <div class="content-item">
                <table class="schedule_table">
                    <tr>
                        <th class="schedule_header">日程</th>
                        <th class="schedule_header">開始時間</th>
                        <th class="schedule_header">終了時間</th>
                        <th class="schedule_header">場所</th>
                    </tr>
                    @foreach($opponents as $opponent)
                    <tr>
                        <td class="schedule_data">{{ $opponent['game_day'] }}</td>
                        <td class="schedule_data"><?php echo date("H:i", strtotime($opponent['start_time'])) ?></td>
                        <td class="schedule_data"><?php echo date("H:i", strtotime($opponent['end_time'])) ?></td>
                        <td class="schedule_data">{{ $opponent['game_place'] }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
