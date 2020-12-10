<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $posts = auth()->user()->posts;
    return view('admin.posts.index', ['posts' => $posts]);
  }

  public function show(Post $post)
  {
    return view('blog-post', ['post' => $post]);
  }

  public function create()
  {
    return view('admin.posts.create');
  }

  public function store(Request $request)
  {
    $post = $request->validate([
      'title' => 'required | min:8 | max:250',
      'post_image' => 'mimes:jpeg,jpg,png',
      'body' => 'required | min:300'
    ]);
    if (request('post_image')) {
      $post['post_image'] = $request->post_image->store('images', 'public');
    }
    try {
      auth()->user()->posts()->create($post);
      return redirect()->route('posts.index')->with('create-post-message', 'Post uploaded successfully!');
    } catch (\Exception $e) {
      return redirect()->route('posts.index')->with('create-post-error', 'Unable to upload post!');
    }
  }

  public function getPost(Post $post)
  {
    return view('admin.posts.edit', ['post' => $post]);
  }

  public function update(Post $post)
  {
    $validatedPost = request()->validate([
      'title' => 'required | min:8 | max:250',
      'post_image' => 'mimes:jpeg,jpg,png',
      'body' => 'required | min:300'
    ]);
    if (request('post_image')) {
      $post['post_image'] = request()->post_image->store('images', 'public');
    }
    $post->title = $validatedPost['title'];
    $post->body = $validatedPost['body'];
    try {
      $post->update();
      return redirect()->route('posts.index')->with('update-post-message', 'Post updated successfully!');
    } catch (\Exception $e) {
      return redirect()->route('posts.index')->with('update-post-error', 'Unable to update post!');
    }
  }

  public function destroy(Post $post)
  {
    try {
      $post->delete();
      return redirect()->back()->with('message', 'Deleting post was successful');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Deleting post was unsuccessful');
    }
  }
}
