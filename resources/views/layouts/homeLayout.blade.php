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
    @yield('content')
</section>


<script src="js/tab.js"></script>
<script>
    function imgPreView(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        var preview = document.getElementById("preview");
        var previewImage = document.getElementById("previewImage");
        var profileImage = document.getElementById("profileImage");
        
        if(previewImage != null) {
            preview.removeChild(previewImage);
        }
        reader.onload = function(event) {
            var img = document.createElement("img");
            img.setAttribute("src", reader.result);
            img.setAttribute("id", "previewImage");
            preview.appendChild(img);
            profileImage.style.display ="none";
        };
        
        reader.readAsDataURL(file);
    }
</script>
</body>
</html>