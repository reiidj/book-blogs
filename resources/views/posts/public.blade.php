@extends('layouts.app') {{-- Extends the main layout --}}

@section('content')
    {{-- START: Page Header for Public Posts --}}
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white leading-tight">
            Latest Blog Posts
        </h1>
        <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
            Discover engaging articles and insights from our community.
        </p>
    </div>
    {{-- END: Page Header for Public Posts --}}

    {{-- START: Conditional Display for Posts or No Posts Message --}}
    @if ($posts->isEmpty())
        {{-- Message displayed when no public posts are found --}}
        <div class="text-center py-12">
            <p class="text-2xl text-gray-600 dark:text-gray-400 mb-6">No public posts available yet.</p>
            {{-- Optionally, a call to action for logged-in users to create the first post --}}
            @auth
                <a href="{{ route('posts.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out">
                    Create Your First Post!
                </a>
            @endauth
        </div>
    @else
        {{-- START: Posts Grid Layout for Public Posts --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-20">

            {{-- Loop through each post to create a card --}}
            @foreach ($posts as $post)
                {{-- START: Individual Public Post Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-12
                            transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">

                    {{-- Image Section of the Card --}}
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

                    {{-- Card Content Section --}}
                    <div class="p-6">
                        {{-- Post Title --}}
                        <h2 class="text-xl md:text-2xl font-bold mb-3 text-gray-900 dark:text-white leading-tight">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200">
                                {{ $post->title }}
                            </a>
                        </h2>

                        {{-- Post Author and Date (Meta Info) --}}
                        <div class="flex justify-between items-center text-gray-500 dark:text-gray-400 text-xs mb-4">
                            <span>By <span class="font-semibold">{{ $post->user->name ?? 'Unknown' }}</span></span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>

                        {{-- Post Excerpt/Content --}}
                        <p class="text-gray-700 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($post->content, 120) }}
                        </p>

                        {{-- Read More Button --}}
                        <a href="{{ route('posts.show', $post) }}"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4
                                  rounded-lg transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                            Read More
                        </a>
                    </div>
                </div>
                {{-- END: Individual Public Post Card --}}
            @endforeach

        </div>
        {{-- END: Posts Grid Layout for Public Posts --}}
    @endif
    {{-- END: Conditional Display for Posts or No Posts Message --}}
@endsection