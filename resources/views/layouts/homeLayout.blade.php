<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- カレンダー -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
<!----- ヘッダー部分 ----->
<header class="header flex">
    @include('header')
</header>


<!----- 投稿一覧 ----->
<section class="section-wrapper">
    <div class="commonInner">
        @yield('content')
    </div>
</section>

</body>
</html>