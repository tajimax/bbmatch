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
                @if( $image !== NULL )
                    <img class="profile" src="{{ Storage::url($image->file_path) }}"/>
                @else
                    <img class="profile" src="/images/profile.jpeg" alt="">
                @endif
            </div>
            <div class="content-item">
                <form action="{{ route('SearchSchedule') }}" method="post" class="flex">
                    @csrf
                    <div class="group">
                        <input style="position:relative;" type="date" name="date">
                        <div class="text_underline"></div>
                    </div>
                    <div>
                        {{ $item -> date }}
                    </div>
                    <input class="profile-edit" type="submit" value="検索">
                </form>
                <div class="field">
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
                <div style="font-size:18px; position: absolute; right:50px; bottom:0px;">参加人数:　<span style="font-size:48px;">9</span>　人</div>
            </div>
            <div class="content-item" style="padding: 0 30px;">
                <div class="flex" style="align-items: flex-end;">
                    <div class="group" style="width: 400px;">
                        <div class="profile-item" style="font-size: 32px;">{{ $item->name }}</div>
                        <div class="text_underline"></div>
                    </div>
                    <div class="flex-column">
                        <div class="profile-edit" style="margin: 0 auto 20px; border: 0px solid #fff;"></div>
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
