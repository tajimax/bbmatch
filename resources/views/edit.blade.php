<form action="{{ route('update') }}" method="post" class="profile-wrapper" enctype="multipart/form-data">
    @csrf
    <div class="profile-btn flex">
        <a href="{{ route('home') }}" class="btn">キャンセル</a>
        <input type="submit" value="更新" class="btn">
    </div>
    <label for="img-select" class="img-select-label"><< プロフィール画像を選択</label>
    <input id="img-select" class="img-select" type="file" name="image" accept="image/png, image/jpeg, image/jpg" onChange="imgPreView(event)">
    <input class="profile-name profile-item" name="name" type="text" value="{{ $profile->name }}" style="height:50px; margin-top:30px;">
    @if ($errors->has('name'))
        <div>{{ $errors->first('name') }}</div>
    @endif
    <select class="profile-address profile-item" name="address" type="text" value="{{ $profile->address }}">
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
    @if ($errors->has('address'))
        <div>{{ $errors->first('address') }}</div>
    @endif
    <div class="profile-intro">
        <div class="profile-intro-label">　チーム紹介</div>
        <textarea class="profile-intro-text" name="introduction" id="" cols="30" rows="6">{{ $profile->introduction }}</textarea>
    </div>
    @if ($errors->has('introduction'))
        <div>{{ $errors->first('introduction') }}</div>
    @endif
    <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
</form>