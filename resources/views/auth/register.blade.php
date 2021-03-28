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
                        <label for="name" class="form-label">{{ __('チーム名') }}</label>
                        <input id="name" type="text" class="form-input" name="name">
                    </div>
                    @error('name')
                        {{$message}}
                    @enderror

                    <div class="flex form-item">
                        <label for="email" class="form-label">{{ __('メールアドレス') }}</label>
                        <input id="email" class="form-input" type="email" value="{{ old('email') }}" required autocomplete="email" name="email">
                    </div>
                    @error('email')
                        {{$message}}
                    @enderror

                    <div class="flex form-item">
                        <label class="form-label">{{ __('所在地') }}</label>
                        <select class="form-input" name="address" type="text" value="">
                            <option value="">選択してください</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都" selected>東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                    </div>
                    @error('address')
                        {{$message}}
                    @enderror

                    <div class="flex form-item">
                        <label for="password" class="form-label">{{ __('パスワード') }}</label>
                        <input id="password" type="password" class="form-input" name="password" required autocomplete="new-password" placeholder="必須">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="flex form-item">
                        <label for="password-confirm" class="form-label">{{ __('パスワード確認') }}</label>
                        <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                
                <div class="form-btn-wrapper">
                    <a class="form-btn" href="javascript:history.back()">キャンセル</a>
                    <button type="submit" class="form-btn">
                        {{ __('登録') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection