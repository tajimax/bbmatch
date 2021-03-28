<div class="profile-wrapper">
    <div class="profile-name"><p class="profile-item"><span style="font-size:1rem;">チーム名： </span>{{ $profile['name'] }}</p></div>
    @if(Auth::id() === $profile['id'])
    <div class="profile-btn flex">
        <a href="{{ route('edit') }}" class="btn">プロフィール編集</a>
    </div>
    @endif
    <div class="profile-address"><p class="profile-item"><span style="font-size:1rem;">所在地： </span>{{ $profile['address'] }}</p></div>
    <div class="profile-intro">
        <label class="profile-intro-label">　チーム紹介</label>
        @if($profile['introduction'] === NULL)
            <div class="profile-intro-text">チーム紹介文はありません。</div>
        @else
            <div class="profile-intro-text">{{ $profile['introduction'] }}</div>
        @endif
    </div>
</div>