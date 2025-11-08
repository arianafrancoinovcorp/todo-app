<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#FDFDFC] p-6 lg:p-8 font-sans">
        <!-- Logo -->
        <div class="mb-6 lg:mb-8">
            <x-application-mark class="w-12 h-12" />
        </div>

        <!-- Card -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-6 lg:p-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-center text-[#1b1b18] mb-4">
                Create an account
            </h2>

            <p class="mb-6 text-sm lg:text-base text-[#706f6c] text-center">
                Join {{ config('app.name') }} and start organizing your tasks efficiently.
            </p>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-gray-700" />
                    <x-input id="name" class="block mt-1 w-full border-gray-300 rounded-md focus:border-[#ffe41d] focus:ring focus:ring-[#ffe41d]/50"
                             type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                    <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-[#ffe41d] focus:ring focus:ring-[#ffe41d]/50"
                             type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700" />
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-[#ffe41d] focus:ring focus:ring-[#ffe41d]/50"
                             type="password" name="password" required autocomplete="new-password" />
                </div>

                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-gray-700" />
                    <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md focus:border-[#ffe41d] focus:ring focus:ring-[#ffe41d]/50"
                             type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2 text-sm text-gray-600">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline hover:text-[#ffe41d]">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline hover:text-[#ffe41d]">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-[#1b1b18] transition-colors">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4 px-6 py-2 bg-[#ffe41d] text-[#1b1b18] font-medium rounded-md hover:bg-[#f5da1c] transition-colors">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
