<x-admin-master>
  @section('content')
    <h1>All users available here</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Username</th>
              <th>Avatar</th>
              <th>Registered On</th>
              <th>Last Updated </th>
              <th>Salary</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Username</th>
              <th>Avatar</th>
              <th>Registered On</th>
              <th>Last Updated </th>
              <th>Salary</th>
            </tr>
            </tfoot>
            <tbody>
            @forelse($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td><img height="40px" src="{{$user->avatar}}" alt=""></td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
{{--                  @can('view',$post)--}}
{{--                    <form action="{{route('posts.get',$post->id)}}" method="get">--}}
{{--                      @csrf--}}
{{--                      <button class="btn btn-outline-warning btn-block"> Edit</button>--}}
{{--                      @method('GET')--}}
{{--                    </form>--}}
{{--                    <form action="{{route('posts.destroy',$post->id)}}" method="post">--}}
{{--                      @csrf--}}
{{--                      <button class="btn btn-outline-danger btn-block">Delete</button>--}}
{{--                      @method('DELETE')--}}
{{--                    </form>--}}
{{--                  @endcan--}}
                </td>
              </tr>
            @empty
              <h1 class="my-4">No posts to display</h1>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endsection

  @section('scripts')
  <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  @endsection

</x-admin-master>