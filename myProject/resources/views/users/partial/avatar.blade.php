<!-- resources/views/users/partial/avatar.blade.php -->

 <!-- gravatar_profile_url(), gravatar_url() Helper를 이용하여, 
 사용자의 프로파일 주소와 아바타를 가져왔다. 
 이 Helper들은 다음 섹션에서 구현할 것이다. 
 로그인한 사용자만 포럼을 남길 수 있게 조치했으므로, 
 $user 변수가 없을 가능성은 없다. 
 $user = null 인 경우를 대비해, 미리 조심해서 나쁠 것은 없다.  -->

@if ($user)
  <a class="pull-left hidden-xs hidden-sm" href="{{ gravatar_profile_url($user->email) }}">
    <img class="media-object img-thumbnail" src="{{ gravatar_url($user->email, 64) }}" alt="{{ $user->name }}">
  </a>
@else
  <a class="pull-left hidden-xs hidden-sm" href="{{ gravatar_profile_url('john@example.com') }}">
    <img class="media-object img-thumbnail" src="{{ gravatar_url('john@example.com', 64) }}" alt="Unknown User">
  </a>
@endif