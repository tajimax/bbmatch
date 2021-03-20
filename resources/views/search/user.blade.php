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
                @if( $recruit->getImage() !== NULL )
                    <img class="profile" src="{{ Storage::url($recruit->getImage()) }}"/>
                @else
                    <img class="profile" src="/images/profile_img.svg" alt="">
                @endif
            </div>
            <div class="content-item">
                <div class="profile-wrapper">
                    <div class="profile-name"><p class="profile-item">{{ $recruit->getName() }}</p></div>
                    <div class="profile-address"><p class="profile-item">{{ $recruit->getAddress() }}</p></div>
                    @if($recruit->getIntro() === NULL)
                        <div class="profile-intro">チーム紹介文はありません。</div>
                    @else
                        <div class="profile-intro">{{ $recruit->getIntro() }}</div>
                    @endif
                </div>
            </div>
            <div class="content-item">
                <div class="">
                    <div class="flex">
                        <table class="schedule_table">
                            <tr>
                                <th class="schedule_header">カテゴリ</th>
                                <th class="schedule_header">日程</th>
                                <th class="schedule_header">開始時間</th>
                                <th class="schedule_header">終了時間</th>
                                <th class="schedule_header">場所</th>
                            </tr>
                            <tr>
                                <td class="schedule_data">
                                    @if( $recruit->category === 'opponent' )
                                    対戦相手
                                    @else
                                    助っ人
                                    @endif
                                </td>
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
                    </div>
                    @if($recruit->note === NULL)
                        <div class="recruit-note">備考はありません。</div>
                    @else
                        <div class="recruit-note">{{ $recruit->note }}</div>
                    @endif
                </div>
                @if(Auth::check())
                    @if(Auth::id() !== $recruit['user_id'])
                    <form class="message-form" action="{{ route('send_msg') }}" method="post">
                        @csrf
                        <input type="hidden" name="recruit_id" value="{{ $recruit->id }}">
                        <input type="hidden" name="send_user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="receive_user_id" value="{{ $recruit->user_id }}">
                        <textarea class="message-textarea" name="text" id="" cols="30" rows="2" placeholder="メッセージを入力"></textarea>
                        <input class="button" type="submit" value="送信">
                    </form>
                    @else
                        <div class="caution" style="color:red; margin:20px 0 0 40px">※自分のやつです</div>
                    @endif
                @else
                    <div class="caution" style="color:red; margin:20px 0 0 40px">※メッセージを送信するには、ログインしてください。</div>
                @endif
            </div>
            <div class="content-item">
                <div class="section__title">{{ $recruit->getName() }}の全ての募集中</div>
                <table class="schedule_table">
                    <tr>
                        <th class="schedule_header">カテゴリ</th>
                        <th class="schedule_header">日程</th>
                        <th class="schedule_header">開始時間</th>
                        <th class="schedule_header">終了時間</th>
                        <th class="schedule_header">場所</th>
                        <th class="schedule_header">詳細</th>
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
                        <td class="schedule_data"><a href="/user/{{ $recruit -> id }}/{{ $recruit -> user_id }}">詳細</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
