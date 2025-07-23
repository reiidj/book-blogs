<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-base text-accent tracking-wide leading-relaxed">

    <div class="min-h-screen flex flex-col">

        {{-- Navigation --}}
        <nav class="bg-primary shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                {{-- Left Nav --}}
                <div class="flex items-center gap-6">
                    <a href="{{ url('/') }}" class="flex items-center text-white font-bold text-2xl hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                        </svg>
                        BookBlog
                    </a>

                    <a href="{{ route('posts.public') }}" class="flex items-center text-accent hover:text-white font-medium transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 16v-2a4 4 0 00-3-3.87V7a6 6 0 00-12 0v3.13A4 4 0 003 14v2l1 1h16l1-1z" />
                        </svg>
                        Public Posts
                    </a>

                    @auth
                        <a href="{{ route('profile.posts') }}" class="flex items-center text-accent hover:text-white font-medium transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            My Posts
                        </a>

                        <a href="{{ route('posts.create') }}"
                        class="flex items-center bg-secondary hover:bg-accent text-black font-semibold px-4 py-2 rounded-lg transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create
                        </a>
                    @endauth
                </div>

                {{-- Right Nav --}}
                <div class="flex items-center gap-4">
                    @auth
                        <div class="flex items-center text-sm text-accent gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A9.001 9.001 0 1118.879 6.196 9.001 9.001 0 015.121 17.804z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Hello, <strong>{{ Auth::user()->name }}</strong>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                        class="text-accent hover:underline font-medium text-sm transition">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                        class="flex items-center bg-secondary hover:bg-accent text-white px-5 py-2 rounded-lg font-semibold transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                        class="flex items-center bg-accent hover:bg-accent text-white px-5 py-2 rounded-lg font-semibold transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 21v-2a4 4 0 00-3-3.87M4 21v-2a4 4 0 013-3.87M12 7a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- Main --}}
        <main class="flex-grow w-full max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-primary py-6 mt-12">
            <div class="text-center text-sm text-accent max-w-7xl mx-auto px-4">
                <span class="italic">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}.</span>
                <span class="font-medium">All rights reserved.</span>
            </div>
        </footer>
    </div>
</body>
</html>
