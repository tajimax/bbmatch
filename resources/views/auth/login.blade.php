@extends('layouts.app')
@section('title', 'ログインページ')

@section('content')
<div class="section">
    <div class="form-wrapper">
        <div class="form-header">{{ __('ログイン') }}</div>

        <div class="form-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex-column form-item">
                    <div class="flex">
                        <label for="email" class="form-label">{{ __('メールアドレス') }}</label>
                        <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                </div>

                <div class="flex-column form-item">
                    <div class="flex">
                        <label for="password" class="form-label">{{ __('パスワード') }}</label>
                        <input id="password" type="password" class="form-input" name="password" required autocomplete="current-password">
                    </div>
                </div>

                @error('email')
                    <p class="login-caution">{{ $message }}</p>
                @enderror

                <div class="form-btn-wrapper">
                    <a class="form-btn" href="javascript:history.back()">キャンセル</a>
                    <button type="submit" class="form-btn">
                        {{ __('ログイン') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
