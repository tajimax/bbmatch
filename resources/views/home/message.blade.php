@extends('layouts.homeLayout')
@section('title', 'マイページ')

@section('content')
    <div class="commonInner">
        <div class="content-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                </div>
            @endif
            <div class="content-item">
                @if( $recruit->getImage() !== NULL )
                    <img class="profile" src="{{ Storage::url($recruit->getImage()) }}"/>
                @else
                    <img class="profile" src="/images/profile_img.svg" alt="">
                @endif
            </div>
            <div class="content-item">
                <div class="message-wrapper">
                    <h2 style="font-size:24px; margin: 10px auto 5px; text-align:center;">メッセージ</h2>
                    <div class="text_underline" style="width:80%; margin:0 auto;"></div>
                    <ul class="message-content">
                    @foreach($messages as $message)
                        @if($message['send_user_id'] === Auth::id())
                        <div class="talk_right">
                            <p>{{ $message['text'] }}</p>
                        </div>
                        @else
                        <div class="talk_left">
                            @if( $message->getImage() !== NULL )
                                <img class="msg-icon" src="{{ Storage::url($message->getImage()) }}" alt="">
                            @else
                                <img class="msg-icon" src="/images/profile_img.svg" alt="">
                            @endif
                            <p>{{ $message['text'] }}</p>
                        </div>
                        @endif
                    @endforeach
                    </ul>
                    <form class="message-reply-form" action="{{ route('reply_msg') }}" method="post">
                        @csrf
                        <input type="hidden" name="recruit_id" value="{{ $recruit->id }}">
                        <input type="hidden" name="send_user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="receive_user_id" value="{{ $message_user_id }}">
                        <textarea class="message-textarea" name="text" id="" cols="30" rows="2" placeholder="メッセージを入力"></textarea>
                        <div class="btn-wrapper flex" style="margin:5px 0 0 auto; width:210px;">
                            <input class="button" type="submit" value="送信">
                        </div>
                        @error('text')
                            <div>{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
            <div class="content-item">
                <div class="">
                    <h2 class="section__title">{{ $recruit->getName() }}</h2>
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
                    <div class="recruit-note" style="margin-top:5px;">{{ $recruit->note }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection