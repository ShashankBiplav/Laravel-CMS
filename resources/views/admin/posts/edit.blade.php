<x-admin-master>
  @section('content')
    <h1>Editing: {{$post->title}}</h1>
    @if(session()->has('create-post-message'))
      <div class="alert alert-success">{{session()->get('message')}}</div>
    @elseif(session()->has('create-post-error'))
      <div class="alert alert-success">{{session()->get('error')}}</div>
    @else
      <div></div>
    @endif
    <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text"
               name="title"
               class="form-control"
               aria-describedby=""
               id="title"
               value="{{$post->title}}"
        />
      </div>
      <div class="form-group">
        <div><img height="80px" src="{{$post->post_image}}" alt=""></div>
        <label for="file">Choose Image</label>
        <input type="file"
               name="post_image"
               class="form-control-file"
               id="post_image"
        />
      </div>
      <div class="form-area">
        <textarea name="body" id="body" cols="90" rows="10" >{{$post->body}}</textarea>
      </div>
      <button class="btn btn-primary">Post</button>
      @method('PUT')
    </form>
  @endsection
</x-admin-master>