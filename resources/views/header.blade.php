<div class="commonInner flex">
    <div class="flex">
        <a href="{{ url('/') }}">
            <img class="header__logo" src="/images/logo.png" alt="logo">
        </a>
        <div class="header-nav">
            <a class="header-nav__btn" href="{{ route('showSearchRecruit') }}">募集一覧</a>
            <a class="header-nav__btn" href="#">新規投稿</a>
        </div>
    </div>
    <div class="btn-wrapper flex">
            <!-- Authentication Links -->
            @guest
                <a class="header_button" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                @if (Route::has('register'))
                    <a class="header_button" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                @endif
            @else
                <a class="header_button" href="{{ route('home') }}">{{ __('マイページ') }}</a>
                <a class="header_button" href="{{ route('logout') }}"
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