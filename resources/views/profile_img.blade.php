@if( $profile['file_path'] !== NULL )
    <div id="preview" class="profile"><img id="profileImage" class="profile" src="{{ Storage::url($profile['file_path']) }}"/></div>
@else
    <div id="preview" class="profile"><img id="profileImage" class="profile" src="/images/profile_img.svg" alt=""></div>
@endif