<x-admin-master>
  @section('content')
    <h1>Profile</h1>
        <h2>{{$user->name}}</h2>
        <h2>{{$user->id}}</h2>
        <h2>{{$user->email}}</h2>
    @endsection
</x-admin-master>