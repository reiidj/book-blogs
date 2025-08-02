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

<div class="min-h-screen px-6 py-10">
    {{-- START: Page Header for Public Posts --}}
    <div class="mb-12">
        <div class="max-w-3xl mx-auto bg-white/90 dark:bg-base p-10 rounded-xl shadow-xl text-center backdrop-blur-sm">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-accent leading-tight">
                Latest Blog Posts
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-primary-300">
                Discover engaging articles and insights from our community.
            </p>
        </div>
    </div>
    {{-- END: Page Header for Public Posts --}}

    {{-- START: Conditional Display for Posts or No Posts Message --}}
    @if ($posts->isEmpty())
        <div class="text-center py-12">
            <div class="max-w-xl mx-auto mt-16 mb-24 px-6">
                <div class="bg-white dark:bg-base rounded-xl shadow-xl px-10 py-6 text-center">
                    <p class="text-2xl text-accent">
                        No public posts available yet.
                    </p>
                </div>
            </div>
            @auth
                <a href="{{ route('posts.create') }}"
                   class="inline-block bg-primary hover:bg-accent text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out">
                    Create Your First Post!
                </a>
            @endauth
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($posts as $post)
                <div class="bg-accent dark:bg-accent rounded-xl shadow-lg overflow-hidden flex flex-col
                            transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl"
                     style="margin: 1rem;">

                    {{-- This container creates a perfect square for the image --}}
                    <div class="relative w-full" style="padding-bottom: 100%;">
                        @if ($post->image_url)
                            {{-- The image is positioned to fill the square container --}}
                            <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" class="absolute top-0 left-0 w-full h-full object-cover">
                        @else
                            {{-- The placeholder also fills the square container --}}
                            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-primary text-white">
                                <svg class="w-16 h-16 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Card Content --}}
                    <div class="p-6 text-white dark:text-white flex flex-col flex-grow">
                        <h2 class="text-xl md:text-2xl font-bold mb-3 leading-tight flex-grow">
                            <a href="{{ route('posts.show', $post) }}"
                               class="hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <div class="flex justify-between items-center text-sm text-white/80 mb-4">
                            <span>By <span class="font-semibold">{{ $post->user->name ?? 'Unknown' }}</span></span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>

                        <p class="text-white/90 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($post->content, 120) }}
                        </p>

                        <a href="{{ route('posts.show', $post) }}"
                           class="inline-block bg-white dark:bg-white text-accent font-semibold py-2 px-4
                                  rounded-lg transition duration-300 ease-in-out shadow-md hover:bg-gray-100 dark:hover:bg-gray-300 mt-auto">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection