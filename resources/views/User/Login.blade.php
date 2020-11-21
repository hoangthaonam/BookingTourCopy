<h1>Login Page</h1>
<form action="{{route('login')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i>Login with Facebook</a>
    </div>
    <div class="col-md-8 offset-md-4">
        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-primary"><i class="fa fa-google"></i>Login with Google</a>
    </div>
</div>
  @include('Common.Error')