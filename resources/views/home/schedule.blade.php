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
                    <img class="profile" src="/images/profile.jpeg" alt="">
                @else
                    <img class="profile" src="{{ Storage::url($image->file_path) }}"/>               
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
                                <input type="date" name="date" placeholder="日付で検索">
                                <div class="text_underline"></div>
                            </div>
                            <div class="group">
                                <input type="number" name="member" placeholder="参加人数">
                                <div class="text_underline"></div>
                            </div>
                            <input class="profile-edit" type="submit" value="登録">
                            <a href="{{ route('home') }}" class="profile-edit">キャンセル</a>
                        </div>
                    </form>
                </div>
                <div>参加人数:　<span>9</span>　人</div>
            </div>
            <div class="content-item">
                <div class="profile-wrapper">
                    <div class="profile-name"><p class="profile-item">{{ $item->name }}</p></div>
                    <div class="profile-btn">
                        <a href="{{ route('edit') }}" class="profile-edit">プロフ   ィール編集</a>
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
                他のチーム一覧をスライダーで実装
            </div>
        </div>
    </div>
@endsection