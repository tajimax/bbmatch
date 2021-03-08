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
                @if( $image !== NULL )
                    <img class="profile" src="{{ Storage::url($image->file_path) }}"/>
                @else
                    <img class="profile" src="/images/profile.jpeg" alt="">
                @endif
            </div>
            <div class="content-item">
                <div class="field">
                    <div class="flex">
                        <form action="{{ route('SearchSchedule') }}" method="post" class="flex">
                            @csrf
                            <div class="group">
                                <input type="date" name="date">
                                <div class="text_underline"></div>
                            </div>
                            <input class="profile-edit" type="submit" value="検索">
                        </form>
                        <a href="{{ route('editSchedule') }}" class="profile-edit">スケジュール登録</a>
                    </div>
                    <img class="diamond" src="/images/field.jpg" alt="">
                    <img class="P position" src="/images/symbol.png" alt="" id="P">
                    <img class="C position" src="/images/symbol.png" alt=""  id="C">
                    <img class="FB position" src="/images/symbol.png" alt="" id="FB">
                    <img class="SB position" src="/images/symbol.png" alt="" id="SB">
                    <img class="TB position" src="/images/symbol.png" alt="" id="TB">
                    <img class="SS position" src="/images/symbol.png" alt="" id="SS">
                    <img class="LF position" src="/images/symbol.png" alt="" id="LF">
                    <img class="CF position" src="/images/symbol.png" alt="" id="CF">
                    <img class="RF position" src="/images/symbol.png" alt="" id="RF">
                </div>
                <div>参加人数:　
                    <span>
                        @if( $position !== NULL )
                            {{ $position->member }}
                        @endif
                    </span>
                    　人
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
                メッセージとかお知らせとか表示
            </div>
        </div>
    </div>
@endsection