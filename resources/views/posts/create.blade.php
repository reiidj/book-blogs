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

<div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-24">
    <div class="w-full max-w-4xl bg-white/90 dark:bg-base rounded-xl shadow-xl p-6 sm:p-10 lg:p-12 backdrop-blur-sm">

        <h2 class="text-3xl font-bold text-primary mb-10">Create New Post</h2>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-neutral mb-2">Title</label>
                <input type="text" name="title" id="title" required
                    class="w-full border border-neutral/30 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-accent"
                    value="{{ old('title') }}">
                @error('title')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div>
                <label for="content" class="block text-sm font-medium text-neutral mb-2">Content</label>
                <textarea name="content" id="content" required rows="6"
                    class="w-full border border-neutral/30 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-accent">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Author --}}
            <div>
                <label for="author" class="block text-sm font-medium text-neutral mb-2">Author</label>
                <input type="text" name="author" id="author"
                    class="w-full border border-neutral/30 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-accent"
                    value="{{ old('author') }}">
                @error('author')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Upload --}}
            <div>
                <label for="image" class="block text-sm font-medium text-neutral mb-2">Image (optional)</label>
                <input type="file" name="image" id="image"
                    class="w-full text-neutral focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-neutral/10 file:text-sm file:text-neutral hover:file:bg-neutral/20">
                @error('image')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-4 pt-8">
                <a href="{{ route('posts.index') }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded-lg transition shadow">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-primary hover:bg-accent text-white font-medium px-5 py-2 rounded-lg transition shadow">
                    Create
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
