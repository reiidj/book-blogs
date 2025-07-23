<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    // Show all posts by the logged-in user
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Show public posts (anyone can see)
    public function publicIndex()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.public', compact('posts'));
    }

    // Show form to create a new post
    public function create()
    {
        return view('posts.create');
    }

    // SHOW THE POSTS
    public function show(Post $post)
    {
        // Optional: eager-load the user relationship just in case
        $post->load('user');

        return view('posts.show', compact('post'));
    }

    // Store new post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle the uploaded image
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $imageUrl = '/storage/' . $path;
        }

        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author' => $request->input('author'),
            'image_url' => $imageUrl,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('profile.posts')->with('success', 'Post created!');
    }


    // Edit form (only for owner)
    public function edit($id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        return view('posts.edit', compact('post'));
    }

    // Update post
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    // Delete post
    public function destroy($id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }

    // Redirected dashboard route
    public function userPosts()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        return view('profile.posts', compact('posts'));
    }
}
