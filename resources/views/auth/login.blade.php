<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#FDFDFC] p-6 lg:p-8 font-sans">
        <!-- Logo -->
        <div class="mb-6 lg:mb-8">
            <x-application-mark class="w-12 h-12" />
        </div>

        <!-- Card -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-6 lg:p-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-center text-[#1b1b18] mb-6">
                Welcome Back
            </h2>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                    <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-[#ffe41d] focus:ring focus:ring-[#ffe41d]/50" 
                             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700" />
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-[#ffe41d] focus:ring focus:ring-[#ffe41d]/50"
                             type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                </div>

                <!-- Actions -->
                <div class="flex flex-col lg:flex-row items-center justify-between gap-3 mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-gray-600 hover:text-[#1b1b18] transition-colors">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="w-full lg:w-auto px-6 py-2 bg-[#ffe41d] text-[#1b1b18] font-medium rounded-md hover:bg-[#f5da1c] transition-colors">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

            <!--Link to Register -->
            @if (Route::has('register'))
                <p class="mt-6 text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-medium text-[#1b1b18] hover:text-[#ffe41d] transition-colors">
                        Get started
                    </a>
                </p>
            @endif
        </div>
    </div>
</x-guest-layout>
