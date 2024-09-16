<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
           イベントカレンダー
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto event-calendar sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-xl calendar-border">
                @if (session('status'))
                    <div class="px-4 py-4 text-sm font-medium text-green-600 text-bold bg-green-50">
                        {{ session('status') }}
                    </div>
                @endif
                @livewire('calendar')
            </div>
        </div>
    </div>
</x-app-layout>


