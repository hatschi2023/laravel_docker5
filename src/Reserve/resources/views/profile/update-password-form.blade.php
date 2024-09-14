<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('パスワード変更') }}
    </x-slot>

    <x-slot name="description">
        {{ __('安全を保つために、長くてランダムなパスワードを使用していることを確認してください。') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('古いパスワード') }}" />
            <x-jet-input id="current_password" type="password" class="block w-full mt-1" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('新しいパスワード') }}" />
            <x-jet-input id="password" type="password" class="block w-full mt-1" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('確認のためパスワードを再入力') }}" />
            <x-jet-input id="password_confirmation" type="password" class="block w-full mt-1" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('保存しました.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('保存') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
