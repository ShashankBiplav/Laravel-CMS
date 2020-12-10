<x-admin-master>
  @section('content')

    <h1>All Posts</h1>
    @if(session()->has('message'))
      <div class="alert alert-success">{{session()->get('message')}}</div>
    @elseif(session()->has('update-post-message'))
      <div class="alert alert-success">{{session()->get('update-post-message')}}</div>
    @elseif(session()->has('error'))
      <div class="alert alert-success">{{session()->get('error')}}</div>
    @elseif(session()->has('update-post-error'))
      <div class="alert alert-success">{{session()->get('update-post-message')}}</div>
    @else
      <div></div>
    @endif
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th>Id</th>
              <th>Posted By</th>
              <th>Title</th>
              <th>Cover Image</th>
              <th>Created At</th>
              <th>UpdatedAt</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Id</th>
              <th>Posted By</th>
              <th>Title</th>
              <th>Cover Image</th>
              <th>Created At</th>
              <th>UpdatedAt</th>
              <th>Actions</th>
            </tr>
            </tfoot>
            <tbody>
            @forelse($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td><img height="40px" src="{{$post->post_image}}" alt=""></td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>
                  @can('view',$post)
                    <form action="{{route('posts.get',$post->id)}}" method="get">
                      @csrf
                      <button class="btn btn-outline-warning btn-block"> Edit</button>
                      @method('GET')
                    </form>
                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
                      @csrf
                      <button class="btn btn-outline-danger btn-block">Delete</button>
                      @method('DELETE')
                    </form>
                  @endcan
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
    <div class="d-flex">
      <div class="mx-auto">
        {{$posts->links()}}
      </div>
    </div>
  @endsection

  @section('scripts')
  <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    {{--    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}
  @endsection
</x-admin-master>