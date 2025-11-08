<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col items-center justify-center p-6 lg:p-8 font-sans">

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center text-center gap-6 lg:gap-10">
        <!-- App Logo -->
        <div class="mb-6 lg:mb-8">
            <x-application-mark class="w-12 h-12" />
        </div>

        <!-- Title -->
        <h1 class="text-3xl lg:text-5xl font-bold text-[#1b1b18]">
            Welcome to {{ config('app.name') }}
        </h1>

        <!-- Description -->
        <p class="text-lg lg:text-xl text-[#706f6c] max-w-lg">
            A to-do platform that helps you stay organized and focus on your work and life
        </p>

        <!-- Auth Buttons -->
        @if (!auth()->check())
            <div class="flex gap-4 mt-4">
                <!-- Login Button -->
                <a href="{{ route('login') }}"
                   class="inline-flex px-6 py-2 rounded-md bg-[#ffe41d] text-[#1b1b18] font-medium hover:bg-[#ffea40] transition duration-150 ease-in-out">
                    Login
                </a>

                <!-- Register / Get Started Button -->
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="inline-flex px-6 py-2 rounded-md border border-[#1b1b18] text-[#1b1b18] font-medium hover:bg-[#1b1b18] hover:text-[#ffe41d] transition duration-150 ease-in-out">
                        Get Started
                    </a>
                @endif
            </div>
        @endif
    </main>

</body>
</html>
