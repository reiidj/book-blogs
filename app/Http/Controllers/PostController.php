<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Protect all methods with authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the form to create a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title'   => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(), //
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Display posts that belong to the authenticated user
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('posts.index', compact('posts'));
    }

    // Show form to edit a post (only if owned by user)
    public function edit($id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        return view('posts.edit', compact('post'));
    }

    // Update an existing post (only if owned by user)
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    // Delete a post (only if owned by user)
    public function destroy($id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
