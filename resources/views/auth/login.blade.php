@extends('layouts.app')
@section('title', 'ログインページ')

@section('content')
<div class="section">
    <div class="form-wrapper">
        <div class="form-header">{{ __('ログイン') }}</div>

        <div class="form-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex form-item">
                    <label for="email" class="form-label">{{ __('メールアドレス') }}</label>
                    <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex form-item">
                    <label for="password" class="form-label">{{ __('パスワード') }}</label>
                    <input id="password" type="password" class="form-input" name="password" required autocomplete="current-password">
                    @error('password')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="btn-wrapper flex">
                    <button type="submit" class="button">
                        {{ __('ログイン') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
