<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progate</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/top.css">
</head>

<body>
<header class="header flex">
    <div class="commonInner flex">
        <a href="{{ route('showSearchRecruit') }}">
            <img class="header__logo" src="/images/logo.png" alt="logo">
        </a>
        <div class="btn-wrapper flex">
            <a class="button" href="{{ route('home') }}">ログイン</a>
            <a class="button" href="{{ route('register') }}">新規登録</a>
        </div>
    </div>
</header>

<div class="top-wrapper">
    <div class="container">
        <h2>草野球チームのためのマッチングサービス</h2>
        <p>草野球の「対戦チーム」「助っ人」探しを快適に</p>
        <div class="btn-wrapper flex" style="width:470px; margin:60px auto 0;">
            <a href="{{ route('login_guest_01') }}" class="button guest1">ゲスト１でログイン</a>
            <a href="{{ route('login_guest_02') }}" class="button guest2">ゲスト２でログイン</a>
        </div>
        <a href="{{ route('showSearchRecruit') }}" class="facebook">ログインなしで利用</a>
    </div>
</div>
</body>
</html>