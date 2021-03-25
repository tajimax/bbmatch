<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/home.css">
    <link href="{{ asset('css/tab.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<body>
<!----- ヘッダー部分 ----->
<header class="header flex">
    @include('header')
</header>


<!----- 投稿一覧 ----->
<section class="section-wrapper">
    <div class="commonInner">
        <div class="content-wrapper">
            <div class="content-item">
                @include('profile_img')
            </div>
            <div class="content-item">
                @include('profile')
            </div>
            <div class="content-item">
                @include('recruit_detail')
            </div>
            <div class="content-item">
                @include('recruit_messages')
            </div>
        </div>
    </div>
</section>

</body>
</html>