@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-16">
    {{-- Post Image --}}
    @if($post->image_url)
        <div class="mb-8">
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                 class="w-full h-80 object-cover rounded-xl shadow-lg">
        </div>
    @endif

    {{-- Post Title --}}
    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4 leading-tight">
        {{ $post->title }}
    </h1>

    {{-- Meta Info --}}
    <div class="text-sm text-gray-500 dark:text-gray-400 mb-8">
        By <span class="font-medium">{{ $post->user->name ?? 'Unknown' }}</span> · 
        {{ $post->created_at->format('F d, Y') }}
    </div>

    {{-- Post Content --}}
    <div class="prose prose-lg dark:prose-invert max-w-none">
        {!! nl2br(e($post->content)) !!}
    </div>

    {{-- Back Button --}}
    <div class="mt-12">
        <a href="{{ url()->previous() }}"
           class="inline-block text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-semibold transition">
            ← Back to Posts
        </a>
    </div>
</div>
@endsection
