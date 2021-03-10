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
                チャット画面
            </div>
            <div class="content-item">
                <div class="profile-wrapper">
                    <div class="profile-name"><p class="profile-item">{{ $item->name }}</p></div>
                    <div class="profile-address"><p class="profile-item">{{ $item->address }}</p></div>
                    <div class="profile-intro">
                        試合の詳細を表示
                    </div>
                </div>
            </div>
            <div class="content-item">
                チャット画面
            </div>
        </div>
    </div>
@endsection
