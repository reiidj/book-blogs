<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- THIS IS THE FIX

class AdminController extends Controller
{
    /**
     * Display the main admin dashboard hub.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the user management page.
     */
    public function usersIndex()
    {
        return view('admin.users.index', [
            'users' => User::latest()->get(),
        ]);
    }

    /**
     * Show the post management page.
     */
    public function postsIndex()
    {
        return view('admin.posts.index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    /**
     * Update a user's role to 'admin'.
     */
    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return back()->with('success', $user->name . ' is now an admin.');
    }

    /**
     * Update a user's role to 'user'.
     */
    public function makeUser(User $user)
    {
        $user->role = 'user';
        $user->save();
        return back()->with('success', $user->name . ' is now a user.');
    }

    /**
     * Delete a post from the platform.
     */
    public function destroyPost(Post $post)
    {
        // Delete the post's image file from storage if it exists
        if ($post->image_url) {
            Storage::disk('public')->delete($post->image_url);
        }

        $post->delete();

        return back()->with('success', 'Post has been deleted successfully.');
    }
}