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
                    <label for="img-select" class="fas fa-camera"></label>
                    <input id="img-select" class="img-select" type="file" name="image" accept="image/png, image/jpeg" onChange="imgPreView(event)">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="submit" value="更新">
                </form>
                @if( $image !== NULL )
                    <div id="preview" class="preview"><img class="profile" src="{{ Storage::url($image->file_path) }}"/></div>
                @else
                    <div id="preview" class="preview"><img class="profile" src="/images/profile.jpeg" alt=""></div>
                @endif
            </div>
            <div class="content-item flex">
                <div class="field">
                    <img class="diamond" src="/images/field.jpg" alt="">
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
            </div>
            <div class="content-item">
                <form action="{{ route('update') }}" method="post" class="profile-wrapper">
                    @csrf
                    <input class="profile-name" name="name" type="text" value="  {{ $item->name }}">
                    @if ($errors->has('name'))
                        <div>{{ $errors->first('name') }}</div>
                    @endif
                    <div class="profile-btn flex">
                        <a href="{{ route('home') }}" class="profile-edit">キャンセル</a>
                        <input type="submit" value="更新" class="profile-edit">
                    </div>
                    <input class="profile-address" name="address" id="input" type="text" value="  {{ $item->address }}">
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
                <!-- 本当はgoogleapi使っておすすめの球場を表示したい -->
                他のチーム一覧をスライダーで実装
            </div>
        </div>
    </div>
@endsection
