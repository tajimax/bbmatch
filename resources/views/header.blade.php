<div class="commonInner flex">
    <div class="flex">
        <a href="{{ url('/') }}">
            <img class="header-logo" src="/images/logo.png" alt="logo">
        </a>
        <div class="header-nav">
            <a class="header-nav__item" href="{{ route('showSearchRecruit') }}">募集一覧</a>
            <a class="header-nav__item" href="{{ route('post_recruit') }}">新規投稿</a>
        </div>
    </div>
    <div class="btn-wrapper flex">
            @auth
                <p class="login-status">※{{ Auth::user()->name }}でログイン中です</p>
            @else
                <p class="login-status">※ログインしていません。</p>
            @endauth
            @guest
                <a class="header_btn" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                @if (Route::has('register'))
                    <a class="header_btn" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                @endif
            @else
                <a class="header_btn" href="{{ route('home') }}">{{ __('マイページ') }}</a>
                <a class="header_btn" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            @endguest
    </div>
</div>