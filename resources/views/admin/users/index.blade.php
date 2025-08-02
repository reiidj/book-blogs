@extends('layouts.app')

@section('content')
<div class="bg-base-100 dark:bg-base-900 min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">
        <header class="mb-8">
            <a href="{{ route('admin.dashboard') }}" class="text-accent hover:underline mb-4 block">&larr; Back to Dashboard</a>
            <h1 class="text-4xl font-bold text-primary dark:text-accent">User Management</h1>
            <p class="mt-1 text-base-500 dark:text-base-400">Oversee all registered users and manage their roles.</p>
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
                        <th scope="col" class="py-3.5 px-6 text-left text-sm font-semibold text-primary dark:text-primary">Name</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-sm font-semibold text-primary dark:text-primary">Email</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-sm font-semibold text-primary dark:text-primary">Role</th>
                        <th scope="col" class="relative py-3.5 px-6"><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-200 dark:divide-base-700">
                    @foreach ($users as $user)
                    <tr class="hover:bg-base-50/50 dark:hover:bg-base-700/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary dark:text-primary">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-base-600 dark:text-base-300">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $user->role === 'admin' ? 'bg-accent/10 text-accent' : 'bg-primary-500/10 text-primary-600 dark:text-primary-300' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <dropdown-menu-root>
                                <dropdown-menu-trigger class="px-3 py-1 rounded-md text-primary dark:text-base-300 hover:bg-base-100 dark:hover:bg-base-700 font-semibold">Actions</dropdown-menu-trigger>
                                
                                {{-- THIS IS THE FIX: Refined dropdown styles for a cleaner look --}}
                                <dropdown-menu-content class="bg-white dark:bg-base-800 shadow-md rounded-lg p-2 w-48
                                                            ring-1 ring-black ring-opacity-5 dark:ring-white dark:ring-opacity-10">
                                    <dropdown-menu-label class="px-2 py-1.5 text-xs font-semibold text-base-500 dark:text-base-400">Change Role</dropdown-menu-label>
                                    <dropdown-menu-separator class="h-[1px] bg-base-200 dark:bg-base-700 my-1" />
                                    
                                    <dropdown-menu-item as-child>
                                        <form action="{{ route('admin.users.makeAdmin', $user) }}" method="POST" class="w-full">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="w-full text-left px-2 py-1.5 text-sm rounded-md
                                                                        text-primary dark:text-base-200 hover:bg-base-100 dark:hover:bg-base-700/50">
                                                Make Admin
                                            </button>
                                        </form>
                                    </dropdown-menu-item>
                                    <dropdown-menu-item as-child>
                                        <form action="{{ route('admin.users.makeUser', $user) }}" method="POST" class="w-full">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="w-full text-left px-2 py-1.5 text-sm rounded-md
                                                                        text-primary dark:text-base-200 hover:bg-base-100 dark:hover:bg-base-700/50">
                                                Make User
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