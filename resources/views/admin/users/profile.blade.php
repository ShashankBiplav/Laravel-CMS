<x-admin-master>
  @section('content')
    <h1>Your Profile</h1>
    <img height="80px" width="80px" class="img-profile rounded-circle my-4" src="{{asset($user->avatar)}}">
    <div class="row">
      <div class="col-sm-6">
        <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="file" name="avatar">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{$user->username}}">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$user->email}}">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                   id="password">
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          @method('PUT')
        </form>
      </div>
    </div>
  @endsection
</x-admin-master>