@extends('layouts.homeLayout')
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
                <img class="profile" src="/images/profile.jpeg" alt="">
            </div>
            <div class="content-item flex">
                <div class="field">
                    <img class="diamond" src="/images/field.jpg" alt="">
                    <img class="P position {{ $item->P }}" src="/images/symbol.png" alt="" id="P">
                    <img class="C position {{ $item->C }}" src="/images/symbol.png" alt=""  id="C">
                    <img class="FB position {{ $item->FB }}" src="/images/symbol.png" alt="" id="FB">
                    <img class="SB position {{ $item->SB }}" src="/images/symbol.png" alt="" id="SB">
                    <img class="TB position {{ $item->TB }}" src="/images/symbol.png" alt="" id="TB">
                    <img class="SS position {{ $item->SS }}" src="/images/symbol.png" alt="" id="SS">
                    <img class="LF position {{ $item->LF }}" src="/images/symbol.png" alt="" id="LF">
                    <img class="CF position {{ $item->CF }}" src="/images/symbol.png" alt="" id="CF">
                    <img class="RF position {{ $item->RF }}" src="/images/symbol.png" alt="" id="RF">
                </div>
            </div>
            <div class="content-item" style="padding: 0 30px 30px;">
                <div class="group">
                    <div class="profile-item">{{ $item->name }}</div>
                    <div class="text_underline"></div>
                </div>
                <div class="group">
                    <div class="profile-item">{{ $item->address }}</div>
                    <div class="text_underline"></div>
                </div>
                <div class="profile-intro">{{ $item->introduction }}</div>
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
