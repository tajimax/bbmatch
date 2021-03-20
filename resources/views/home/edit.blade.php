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
                    <div class="profile-btn flex">
                        <a href="{{ route('home') }}" class="profile-edit">キャンセル</a>
                        <input type="submit" value="更新" class="profile-edit">
                    </div>
                    <label for="img-select" class="img-select-label"><< プロフィール画像を選択</label>
                    <input id="img-select" class="img-select" type="file" name="image" accept="image/png, image/jpeg, image/jpg" onChange="imgPreView(event)">
                    <input class="profile-name profile-item" name="name" type="text" value="{{ $item->name }}" style="height:50px; margin-top:30px;">
                    @if ($errors->has('name'))
                        <div>{{ $errors->first('name') }}</div>
                    @endif
                    <input class="profile-address profile-item" name="address" id="input" type="text" value="{{ $item->address }}" style="line-height:1;">
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
            <div class="content-item">
                <h2 class="section__title"><span>募集中一覧</span></h2>
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
            <div class="content-item">
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
@endsection