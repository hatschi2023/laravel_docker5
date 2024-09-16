<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            イベント詳細
        </h2>
    </x-slot>

    <div class="pt-4 pb-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="py-4 overflow-hidden bg-white shadow-xl sm:rounded-xl mypage-border">
            {{-- <div class="py-4 overflow-hidden bg-white shadow-xl sm:rounded-xl cloud-border"> --}}

                <div class="max-w-2xl py-4 mx-auto">
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                    <div class="px-4 py-4 text-sm font-medium text-green-600 bg-green-50">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        <x-jet-label for="event_name" value="イベント名" />
                        <div class="mx-4 mt-1">
                            {{ $event->name }}
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="information" value="イベント詳細" />
                        <div class="mx-4 mt-1">
                            {!! $event->information !!}
                        </div>
                    </div>

                    <div class="justify-between md:flex">
                        <div class="mt-4">
                            <x-jet-label for="event_date" value="イベント日付" />
                            <div class="mx-4 mt-1">
                                {{ $event->eventDate }}
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="start_time" value="開始時間" />
                            <div class="mx-4 mt-1">
                                {{ $event->startTime }}
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="end_time" value="終了時間" />
                            <div class="mx-4 mt-1">
                                {{ $event->endTime }}
                            </div>
                        </div>
                    </div>

                    <form id="cancel_{{ $event->id }}" method="post" action="{{ route('mypage.cancel', ['id' => $event->id ]) }}">
                        @csrf
                    <div class="items-end justify-between md:flex">
                        <div class="mt-4">
                            <x-jet-label value="予約した人数" />
                            <div class="mx-4 mt-1">
                                {{ $reservation->number_of_people }}
                            </div>
                        </div>
                        @if($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
                        <a href="#" data-id="{{ $event->id }}" onclick="cancelPost(this)"
                            class="inline-flex items-center justify-center h-12 mt-4 ml-4 font-semibold text-white bg-gray-500 rounded-md w-28 hover:bg-gray-600 focus:bg-gray-600">
                            キャンセルする
                        </a>
                        @endif
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function cancelPost(e) {
            'use strict';
            if (confirm('本当にキャンセルしてもよろしいですか？')) {
                document.getElementById('cancel_' + e.dataset.id).submit();
            }
        }
    </script>

</x-app-layout>
