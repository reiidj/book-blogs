@extends('layouts.app')

@section('content')
<style>
    .bg-fullscreen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -10;
        background-image: url('{{ asset('images/Library.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<div class="bg-fullscreen"></div>

<div class="min-h-screen px-6 py-20 flex items-center justify-center">
    <div class="bg-base dark:bg-base rounded-2xl p-10 max-w-3xl w-full text-center shadow-xl">
        <h1 class="text-5xl font-extrabold tracking-tight text-primary dark:text-primary mb-6">
            Welcome to BookBlogs
        </h1>

        <p class="text-lg text-neutral dark:text-neutral/80 max-w-xl mx-auto mb-4">
            Discover, share, and connect through thoughtful book discussions. Whether you’re into fiction,
            non-fiction, or anything in between — this is your space.
        </p>

        <p class="text-base text-neutral/80 dark:text-neutral/60 max-w-xl mx-auto mb-10">
            Start by browsing posts or logging in to write your own insights and reviews.
        </p>

        <div class="flex flex-wrap justify-center gap-4">
            @auth
                <a href="{{ route('profile.posts') }}"
                   class="bg-primary hover:bg-accent text-white font-semibold py-2.5 px-6 rounded-xl transition shadow-lg hover:shadow-xl">
                    Go to Your Dashboard
                </a>
                <a href="{{ route('posts.public') }}"
                   class="bg-secondary hover:bg-accent/80 text-white font-semibold py-2.5 px-6 rounded-xl transition shadow-lg hover:shadow-xl">
                    Explore Public Posts
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="bg-primary hover:bg-accent text-white font-semibold py-2.5 px-6 rounded-xl transition shadow-lg hover:shadow-xl">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="bg-white dark:bg-neutral/10 text-primary hover:bg-neutral/20 font-semibold py-2.5 px-6 rounded-xl transition shadow-md">
                    Register
                </a>
            @endauth
        </div>
    </div>
</div>
@endsection
