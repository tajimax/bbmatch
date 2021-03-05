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
                <form method="post"	action="{{ route('upload_image') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" accept="image/png, image/jpeg">
                    <input type="submit" value="Upload">
                </form>
                <img class="profile" src="/images/profile.jpeg" alt="">
            </div>
            <div class="content-item">
                <div class="field">
                    <div class="flex">
                        <div class="group flex">
                            <form action="{{ route('SearchSchedule') }}" method="post">
                                @csrf
                                <div class="group">
                                    <!-- <label style="position:absolute; width: 100px; left:0; z-index:1; background-color:#fff;" for="calender">あああ</label> -->
                                    <input style="position:relative;" id="calender" type="date" name="date" value="{{ isset($position->date) }}" placeholder="日付で検索" style="color:#fff;">                                    <div class="text_underline"></div>
                                </div>
                            </form>
                            <input class="profile-edit" type="submit" value="検索">
                        </div>
                        <!-- <a href="{{ route('edit') }}" class="profile-edit" style="margin: 0 auto 10px;">プロフィール編集</a> -->
                        <a href="{{ route('editSchedule') }}" class="profile-edit">スケジュール登録</a>
                    </div>
                    <!-- <img class="diamond" src="/images/field.jpg" alt=""> -->
                    <img class="P position {{ isset($position->P) }}" src="/images/symbol.png" alt="" id="P">
                    <img class="C position {{ isset($position->C) }}" src="/images/symbol.png" alt=""  id="C">
                    <img class="FB position {{ isset($position->FB) }}" src="/images/symbol.png" alt="" id="FB">
                    <img class="SB position {{ isset($position->SB) }}" src="/images/symbol.png" alt="" id="SB">
                    <img class="TB position {{ isset($position->TB) }}" src="/images/symbol.png" alt="" id="TB">
                    <img class="SS position {{ isset($position->SS) }}" src="/images/symbol.png" alt="" id="SS">
                    <img class="LF position {{ isset($position->LF) }}" src="/images/symbol.png" alt="" id="LF">
                    <img class="CF position {{ isset($position->CF) }}" src="/images/symbol.png" alt="" id="CF">
                    <img class="RF position {{ isset($position->RF) }}" src="/images/symbol.png" alt="" id="RF">
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
                <!-- <a class="fas fa-edit fa-2x" style="color: dimgray;" href="{{ route('edit') }}"></a> -->
                <!-- <a href="{{ route('edit') }}" class="btn2">編集</a> -->
                <!-- <input type="submit" value="&#xf044"> -->
            </div>
            <div class="content-item">
                おすすめの球場を表示
            </div>
        </div>
    </div>
@endsection
