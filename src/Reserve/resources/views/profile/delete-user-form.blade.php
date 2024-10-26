<x-jet-action-section>
    <x-slot name="title">
        {{ __('アカウント削除') }}
    </x-slot>

    <x-slot name="description">
        {{ __('アカウントを完全に削除します。') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('アカウントを削除すると、そのアカウントのすべてのリソースとデータが完全に削除されます。アカウントを削除する前に、保持したいデータや情報をダウンロードしてください。') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('アカウントを削除する') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('アカウントを削除する') }}
            </x-slot>

            <x-slot name="content">
                {{ __('本当にアカウントを削除してもよろしいですか? アカウントを削除すると、そのリソースとデータはすべて永久に削除されます。アカウントを永久に削除することを確認するには、パスワードを入力してください。') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="block w-3/4 mt-1"
                                autocomplete="current-password"
                                placeholder="{{ __('パスワード') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('キャンセル') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('アカウントを削除する') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
