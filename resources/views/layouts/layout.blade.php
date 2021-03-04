<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<!----- ヘッダー部分 ----->
<header class="header flex">
    @include('header')
</header>


<!----- 投稿一覧 ----->
<section class="section-wrapper">
    <div class="commonInner flex-column">
        @yield('content')
    </div>
</section>

<script>
    const menu = document.querySelectorAll(".js-menu");

    function toggle() {
    const content = this.nextElementSibling;
    this.classList.toggle("is-active");
    content.classList.toggle("is-open");
    }

    for (let i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", toggle);
    }
</script>
</body>
</html>