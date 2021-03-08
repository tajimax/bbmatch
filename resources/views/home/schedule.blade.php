@extends('layouts.app')
@section('title', 'スケジュール追加')

@section('content')
    <div class="commonInner">
        <div class="content-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="content-item">
                @if( $image->file_path === NULL )
                    <a href="{{ route('upload_form') }}"><img class="profile" src="/images/profile.jpeg" alt=""></a>
                @else
                    <a href="{{ route('upload_form') }}"><img src="{{ Storage::url($image->file_path) }}"/></a>                    
                @endif
            </div>
            <div class="content-item flex">
                <div class="field">
                    <form action="{{ route('schedule') }}" method="post">
                        @csrf
                        <img class="diamond" src="/images/field.jpg" alt="">
                        <input class="P check" type="checkbox" name="P" value="active">
                        <input class="C check" type="checkbox" name="C" value="active">
                        <input class="FB check" type="checkbox" name="FB" value="active">
                        <input class="SB check" type="checkbox" name="SB" value="active">
                        <input class="TB check" type="checkbox" name="TB" value="active">
                        <input class="SS check" type="checkbox" name="SS" value="active">
                        <input class="LF check" type="checkbox" name="LF" value="active">
                        <input class="CF check" type="checkbox" name="CF" value="active">
                        <input class="RF check" type="checkbox" name="RF" value="active">
                        <input type="hidden" name="name" value='{{ Auth::user()->name }}'>
                        <input type="hidden" name="address" value='{{ Auth::user()->address }}'>
                        <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
                        <div class="group flex">
                            <div class="group">
                                <input style="position:relative;" type="date" name="date" placeholder="日付で検索" style="color:#fff;">
                                <div class="text_underline"></div>
                            </div>
                            <div class="group">
                                <input style="position:relative;" type="number" name="member" placeholder="参加人数" style="color:#fff;">
                                <div class="text_underline"></div>
                            </div>
                            <input class="profile-edit" type="submit" value="登録">
                            <a href="{{ route('home') }}" class="profile-edit">キャンセル</a>
                        </div>
                    </form>
                </div>
                <div style="font-size:18px; position: absolute; right:50px; bottom:0px;">参加人数:　<span style="font-size:48px;">9</span>　人</div>
            </div>
            <div class="content-item" style="padding: 0 30px;">
                <div class="flex" style="align-items: flex-end;">
                    <div class="group" style="width: 400px;">
                        <div class="profile-item" style="font-size: 32px;">{{ $item->name }}</div>
                        <div class="text_underline"></div>
                    </div>
                    <div class="flex-column">
                        <a href="{{ route('edit') }}" class="profile-edit" style="margin: 0 auto 20px;">プロフィール編集</a>
                        <div class="group" style="width: 200px; text-align: center;">
                            <div class="profile-item">{{ $item->address }}</div>
                            <div class="text_underline"></div>
                        </div>
                    </div>
                </div>
                <div class="profile-intro-wrapper">
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
                おすすめの球場を表示
            </div>
        </div>
    </div>
@endsection