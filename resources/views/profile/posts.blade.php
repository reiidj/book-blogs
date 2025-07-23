@extends('layouts.app')

@section('content')
    {{-- START: Page Header --}}
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white leading-tight">
            My Posts
        </h1>
        <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
            Manage the blog posts you’ve created.
        </p>
        <div class="mt-6">
            <a href="{{ route('posts.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out">
                + New Post
            </a>
        </div>
    </div>

    {{-- START: Conditional Display --}}
    @if ($posts->isEmpty())
        <div class="text-center py-12">
            <p class="text-2xl text-gray-600 dark:text-gray-400 mb-6">You haven’t written any posts yet.</p>
        </div>
    @else
        {{-- START: Posts Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-20">

            @foreach ($posts as $post)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-12
                            transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">

                    {{-- Image --}}
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                        @if($post->image_url)
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center w-full h-full">
                                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="..."/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h2 class="text-xl md:text-2xl font-bold mb-3 text-gray-900 dark:text-white leading-tight">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            Created at: {{ $post->created_at->format('M d, Y') }}
                        </div>

                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($post->content, 120) }}
                        </p>

                        {{-- Action Buttons --}}
                        <div class="flex justify-between items-center">
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="text-blue-600 hover:underline text-sm font-medium">
                                Edit
                            </a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm font-medium">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endif
@endsection
