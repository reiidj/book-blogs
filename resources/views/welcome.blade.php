@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center text-center bg-gradient-to-b from-sky-50 to-white dark:from-gray-900 dark:to-gray-800 px-6">

    <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-6">
        Welcome to BookBlogs
    </h1>

    <p class="text-lg text-gray-700 dark:text-gray-300 max-w-xl mb-4">
        Share your thoughts, explore blog posts, and connect with other readers who love books as much as you do.
    </p>

    <p class="text-lg text-gray-600 dark:text-gray-400 max-w-xl mb-10">
        Start by browsing public posts or logging in to create your own.
    </p>

    <div class="flex flex-wrap justify-center gap-4">
        @auth
            <a href="{{ route('posts.public') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-xl transition-all shadow-md hover:shadow-lg">
                Go to Public Posts
            </a>
        @else
            <a href="{{ route('login') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-xl transition-all shadow-md hover:shadow-lg">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2.5 px-6 rounded-xl transition-all shadow">
                Register
            </a>
        @endauth
    </div>
</div>
@endsection
