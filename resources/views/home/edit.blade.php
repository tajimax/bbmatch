@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
    <div class="commonInner">
        <div class="content-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="content-item">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if( $item['file_path'] !== NULL )
                    <div id="preview" class="profile"><img id="profileImage" class="profile" src="{{ Storage::url($item->file_path) }}"/></div>
                @else
                    <div id="preview" class="profile"><img id="profileImage" class="profile" src="/images/profile_img.svg" alt=""></div>
                @endif
            </div>
            <div class="content-item">
                <form action="{{ route('update') }}" method="post" class="profile-wrapper" enctype="multipart/form-data">
                    @csrf
                    <label for="img-select" class="fas fa-camera">プロフィール写真選択</label>
                    <input id="img-select" class="img-select" type="file" name="image" accept="image/png, image/jpeg, image/jpg" onChange="imgPreView(event)">
                    <input class="profile-name" name="name" type="text" value="{{ $item->name }}">
                    @if ($errors->has('name'))
                        <div>{{ $errors->first('name') }}</div>
                    @endif
                    <div class="profile-btn flex">
                        <a href="{{ route('home') }}" class="profile-edit">キャンセル</a>
                        <input type="submit" value="更新" class="profile-edit">
                    </div>
                    <input class="profile-address" name="address" id="input" type="text" value="{{ $item->address }}">
                    @if ($errors->has('address'))
                        <div>{{ $errors->first('address') }}</div>
                    @endif
                    <textarea class="profile-intro" name="introduction" id="" cols="30" rows="6">{{ $item->introduction }}</textarea>
                    @if ($errors->has('introduction'))
                        <div>{{ $errors->first('introduction') }}</div>
                    @endif
                    <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
                </form>
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
                                <th>カテゴリ</th>
                                <th>日程</th>
                                <th>開始時間</th>
                                <th>終了時間</th>
                                <th>場所</th>
                                <th>新着メッセージ</th>
                            </tr>
                            @foreach($recruits as $recruit)
                            <tr>
                                <td>
                                    @if( $recruit->category === 'opponent' )
                                    対戦相手
                                    @else
                                    助っ人
                                    @endif
                                </td>
                                <td>{{ $recruit['game_day'] }}</td>
                                <td><?php echo date("H:i", strtotime($recruit['start_time'])) ?></td>
                                <td><?php echo date("H:i", strtotime($recruit['end_time'])) ?></td>
                                <td>{{ $recruit['game_place'] }}</td>
                                <td><a href="home/{{ $recruit['id'] }}">a</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-content__item" data-content="1">
                        <form action="{{ route('recruit') }}" method="post">
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
                            <input type="hidden" name="category" value="opponent">
                            <input class="profile-edit" type="submit" value="募集する">
                        </form>
                    </div>
                    <div class="tab-content__item" data-content="2">
                        <form action="{{ route('recruit') }}" method="post">
                            @csrf
                            <div class="flex">
                                <input class="recruit-item" type="date" name="game_day">
                                <input class="recruit-item" type="time" name="start_time">
                                <input class="recruit-item" type="time" name="end_time">
                                <input class="recruit-item" type="text" name="game_place" placeholder="試合場所（グラウンド名など）">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </div>
                            <textarea name="note" id="" cols="6" rows="10" class="recruit-note" placeholder="備考"></textarea>
                            <input type="hidden" name="category" value="helper">
                            <input class="profile-edit" type="submit" value="募集する">
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-item">
                <!-- 本当はgoogleapi使っておすすめの球場を表示したい -->
                他のチーム一覧をスライダーで実装
            </div>
        </div>
    </div>
@endsection