<x-guest-layout>
    <x-jet-authentication-card>

        <!-- Logo -->
        <x-slot name="logo">
            <div class="w-40">
                <a href="/">
                    <x-jet-authentication-card-logo />
                </a>
            </div>
        </x-slot>

        @if (session('status'))
            <div class="px-4 py-4 text-sm font-medium text-green-600 bg-green-50">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('パスワード') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('パスワードを保存する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れたとき') }}
                </a>
                @endif

                <x-jet-button class="ml-4 tx-s">
                    {{ __('ログイン') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
