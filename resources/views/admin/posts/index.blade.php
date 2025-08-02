@extends('layouts.app')

@section('content')
<div class="bg-base-100 dark:bg-base-900 min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">
        <header class="mb-8">
            <a href="{{ route('admin.dashboard') }}" class="text-accent hover:underline mb-4 block">&larr; Back to Dashboard</a>
            <h1 class="text-4xl font-bold text-primary dark:text-accent">Post Management</h1>
            <p class="mt-1 text-base-500 dark:text-base-400">View and manage all posts on the platform.</p>
        </header>

        @if (session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white dark:bg-base-800 rounded-xl shadow-md overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-base-50 dark:bg-base-700/50">
                    <tr>
                        <th scope="col" class="py-3.5 px-6 text-left text-sm font-semibold text-primary dark:text-primary">Title</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-sm font-semibold text-primary dark:text-primary">Author</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-sm font-semibold text-primary dark:text-primary">Created At</th>
                        <th scope="col" class="relative py-3.5 px-6"><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-200 dark:divide-base-700">
                    @foreach ($posts as $post)
                     <tr class="hover:bg-base-50/50 dark:hover:bg-base-700/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary dark:text-white">{{ Str::limit($post->title, 40) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-base-600 dark:text-base-300">{{ $post->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-base-600 dark:text-base-300">{{ $post->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            {{-- Radix UI Dropdown for Post Actions --}}
                            <dropdown-menu-root>
                                <dropdown-menu-trigger class="px-3 py-1 rounded-md text-primary dark:text-base-300 hover:bg-base-100 dark:hover:bg-base-700 font-semibold">Actions</dropdown-menu-trigger>
                                <dropdown-menu-content class="bg-white dark:bg-base-800 shadow-md rounded-lg p-2 w-48
                                                            ring-1 ring-black ring-opacity-5 dark:ring-white dark:ring-opacity-10">
                                    <dropdown-menu-label class="px-2 py-1.5 text-xs font-semibold text-base-500 dark:text-base-400">Post Actions</dropdown-menu-label>
                                    <dropdown-menu-separator class="h-[1px] bg-base-200 dark:bg-base-700 my-1" />
                                    
                                    <dropdown-menu-item as-child>
                                        <a href="{{ route('posts.show', $post) }}" class="block w-full text-left px-2 py-1.5 text-sm rounded-md text-primary dark:text-base-200 hover:bg-base-100 dark:hover:bg-base-700/50">
                                            View Post
                                        </a>
                                    </dropdown-menu-item>
                                    
                                    <dropdown-menu-item as-child>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="w-full" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full text-left px-2 py-1.5 text-sm rounded-md text-red-600 dark:text-red-500 hover:bg-red-500/10 dark:hover:bg-red-500/10">
                                                Delete
                                            </button>
                                        </form>
                                    </dropdown-menu-item>
                                </dropdown-menu-content>
                            </dropdown-menu-root>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection