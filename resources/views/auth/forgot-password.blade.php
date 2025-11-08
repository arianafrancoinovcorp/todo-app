<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#FDFDFC] p-6 lg:p-8 font-sans">
        <!-- Logo -->
        <div class="mb-6 lg:mb-8">
            <x-application-mark class="w-12 h-12" />
        </div>

        <!-- Card -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-6 lg:p-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-center text-[#1b1b18] mb-4">
                Reset your password
            </h2>

            <p class="mb-6 text-sm lg:text-base text-[#706f6c] text-center">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                    <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-[#ffe41d] focus:ring focus:ring-[#ffe41d]/50"
                             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="flex justify-end mt-4">
                    <x-button class="px-6 py-2 bg-[#ffe41d] text-[#1b1b18] font-medium rounded-md hover:bg-[#f5da1c] transition-colors">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>

            <!-- Link back to login -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Remembered your password? 
                <a href="{{ route('login') }}" class="font-medium text-[#1b1b18] hover:text-[#ffe41d] transition-colors">
                    Log in
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
