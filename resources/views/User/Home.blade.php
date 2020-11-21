<h1>Homepage</h1>
@if (Auth::check())
    <a href="{{route('logout')}}">Logout</a>
    <a href="">Write Review</a>
@else
    <a href="{{route('showlogin')}}">Login</a>
@endif