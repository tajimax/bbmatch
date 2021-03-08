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
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="submit" value="Upload">
                </form>
                @if( $image !== NULL )
                    <img class="profile" src="{{ Storage::url($image->file_path) }}"/>
                @else
                    <img class="profile" src="/images/profile.jpeg" alt="">
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
            <div class="content-item" style="padding: 0 30px 30px;">
                <form action="{{ route('update') }}" method="post">
                    @csrf
                    <div class="flex" style="align-items: flex-end;">
                        <div class="group" style="width: 400px;">
                            <input class="profile-item" name="name" id="input" type="text" value="{{ $item->name }}" style="font-size: 32px;">
                            <div class="text_underline"></div>
                        </div>
                        @if ($errors->has('name'))
                            <div>{{ $errors->first('name') }}</div>
                        @endif
                        <div class="flex-column">
                            <div class="flex">
                                <a href="{{ route('home') }}" class="profile-edit">キャンセル</a>
                                <input type="submit" value="更新" class="profile-edit">
                            </div>
                            <div class="group" style="width: 200px; text-align: center;">
                                <input class="profile-item" name="address" id="input" type="text" value="{{ $item->address }}">
                                <div class="text_underline"></div>
                            </div>
                            @if ($errors->has('address'))
                                <div>{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                    </div>
                    <textarea class="textarea" name="introduction" id="" cols="30" rows="6">{{ $item->introduction }}</textarea>
                    @if ($errors->has('introduction'))
                        <div>{{ $errors->first('introduction') }}</div>
                    @endif
                    <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
                </form>
            </div>
            <div class="content-item">
                おすすめの球場を表示
            </div>
        </div>
    </div>

    <script>
        flatpickr('.flatpickr');
    </script>
@endsection
