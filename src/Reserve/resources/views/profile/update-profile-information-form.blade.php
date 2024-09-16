<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('ユーザー情報') }}
    </x-slot>

    <x-slot name="description">
        {{ __('ユーザー情報の更新\プロフィール\メールアドレス') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('プロフィール写真') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">

                    @if ($this->user->profile_photo_path)
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="object-cover w-20 h-20 rounded-full">
                    @else
                        <img class="object-cover w-20 h-20 rounded-full" src="{{ Gravatar::get($this->user->email, ['size' => 80]) }}" alt="{{ $this->user->name }}">
                    @endif
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

               <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('画像を選択してください') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('画像を削除') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('名前') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
            <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model.defer="state.email" autocomplete="username" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="mt-2 text-sm">
                    {{ __('このメールアドレスは確認できません') }}

                    <button type="button" class="text-sm text-gray-600 underline hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('確認メールを再送信するにはここをクリックしてください。') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 text-sm font-medium text-green-600">
                        {{ __('新しい確認リンクがあなたのメールアドレスに送信されました。') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('保存しました。') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('保存') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
