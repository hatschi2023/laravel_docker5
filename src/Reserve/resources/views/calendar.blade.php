<x-calendar-layout>
    <x-slot name="header">
        <div class="flex ">
            <!-- Logo -->
            <div class="flex items-center w-20 shrink-0">
                <a href="/">
                    <x-jet-application-mark class="block w-auto h-9" />
                </a>
            </div>

            <h2 class="h-24 pl-12 text-xl font-semibold leading-tight text-gray-800 pt-14">
                イベントカレンダー
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto event-calendar sm:px-8 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-xl calendar-border">
              @livewire('calendar')
          </div>
        </div>
    </div>
</x-calendar-layout>
