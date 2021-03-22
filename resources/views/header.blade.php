<div class="commonInner flex">
    <a href="{{ url('/') }}">
        <img class="header__logo" src="/images/hdlogo.png" alt="logo">
    </a>
    <div class="btn-wrapper flex">
            <!-- Authentication Links -->
            @guest
                <a class="button" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                @if (Route::has('register'))
                    <a class="button" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                @endif
            @else
                <a class="button" href="{{ route('home') }}">{{ __('マイページ') }}</a>
                <a class="button" href="{{ route('logout') }}"
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