<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> --}}


        <x-jet-authentication-card>

            <!-- Logo -->
            <x-slot name="logo">
                <div class="w-40">
                    <a href="/">
                        <x-jet-authentication-card-logo />
                    </a>
                </div>
            </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('パスワードをリセットしますか？新しいパスワードを作成するリンクをメールでお送りします。') }}
        </div>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('メーアドレス') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('パスワードリセット') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
