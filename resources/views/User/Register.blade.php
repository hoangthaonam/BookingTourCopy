<h1>Register Page</h1>
<form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" value="{{ old('username') }}" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
        <label for="re_password">Password Confirm:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="re_password">
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" value="{{ old('name') }}"placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" value="{{ old('address') }}" placeholder="Enter address" name="address">
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" value="{{ old('phone') }}" placeholder="Enter phone" name="phone">
    </div>
    <div class="form-group">
        <label for="image">Avatar Image:</label>
        <input type="file" class="form-control" value="{{ old('image') }}" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @include('Common.Error')