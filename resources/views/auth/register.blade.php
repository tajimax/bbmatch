@extends('layouts.app')
@section('title', '新規登録ページ')

@section('content')
<div class="section-wrapper">
    <div class="form-wrapper">
        <div class="form-header">{{ __('新規登録') }}</div>
        <div class="form-content">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div>
                    <div class="flex form-item">
                        <label for="name" class="form-label">{{ __('名前') }}</label>
                        <input id="name" type="text" class="form-input" name="name">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="flex form-item">
                        <label for="email" class="form-label">{{ __('メールアドレス') }}</label>
                        <input id="email" class="form-input" type="email" value="{{ old('email') }}" required autocomplete="email" name="email">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="flex form-item">
                        <label for="address" class="form-label">{{ __('所在地') }}</label>
                        <input id="address" class="form-input" type="text" name="address">
                        @error('address')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="flex form-item">
                        <label for="password" class="form-label">{{ __('パスワード') }}</label>
                        <input id="password" type="password" class="form-input" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex form-item">
                        <label for="password-confirm" class="form-label">{{ __('パスワード確認') }}</label>
                        <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                
                <div class="btn-wrapper flex">
                    <button type="submit" class="button">
                        {{ __('登録') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection