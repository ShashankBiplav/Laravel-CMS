<x-admin-master>
  @section('content')
    <h1>New Post</h1>
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       aria-describedby=""
                       id="title"
                       placeholder="Enter Title"
                />
            </div>
            <div class="form-group">
                <label for="file">Choose Image</label>
                <input type="file"
                       name="post_image"
                       class="form-control-file"
                       id="post_image"
                />
            </div>
            <div class="form-area">
                <textarea name="body" id="body" cols="90" rows="10"></textarea>
            </div>
            <button class="btn btn-primary">Post</button>
        </form>
  @endsection
</x-admin-master>