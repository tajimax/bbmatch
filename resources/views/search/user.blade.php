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
                @if( $item->getImage() !== NULL )
                    <img class="profile" src="{{ Storage::url($item->getImage()) }}"/>
                @else
                    <img class="profile" src="/images/symbol.png" alt="">
                @endif
            </div>
            <div class="content-item">
                <div class="">
                    <div class="flex">
                        <div class="recruit-item">{{ $item->game_day }}</div>
                        <div class="recruit-item">{{ $item->start_time }}</div>
                        <div class="recruit-item">{{ $item->end_time }}</div>
                        <div class="recruit-item">{{ $item->game_place }}</div>
                    </div>
                    <div class="recruit-note">{{ $item->note }}</div>
                </div>
            </div>
            <div class="content-item">
                <div class="profile-wrapper">
                    <div class="profile-name"><p class="profile-item">{{ $item->getName() }}</p></div>
                    <div class="profile-address"><p class="profile-item">{{ $item->getAddress() }}</p></div>
                    <div class="profile-intro">{{ $item->getIntro() }}</div>
                </div>
            </div>
            <div class="content-item">
                <table>
                    <tr>
                        <th>日程</th>
                        <th>開始時間</th>
                        <th>終了時間</th>
                        <th>場所</th>
                    </tr>
                    @foreach($opponents as $opponent)
                    <tr>
                        <td>{{ $opponent['game_day'] }}</td>
                        <td><?php echo date("H:i", strtotime($opponent['start_time'])) ?></td>
                        <td><?php echo date("H:i", strtotime($opponent['end_time'])) ?></td>
                        <td>{{ $opponent['game_place'] }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
