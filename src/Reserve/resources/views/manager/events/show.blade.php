<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            イベント詳細
        </h2>
    </x-slot>

    <div class="pt-4 pb-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

            <div class="max-w-2xl py-4 mx-auto">
                <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="px-4 py-4 text-sm font-medium text-green-600 bg-green-50">
                        {{ session('status') }}
                    </div>
                @endif

                <div>
                    <x-jet-label for="event_name" value="イベント名" />
                    <div id="event_name" class="mx-4 mt-1">
                        {{ $event->name }}
                    </div>
                </div>

                <div class="mt-4">
                    <x-jet-label for="information" value="イベント詳細" />
                    <div class="mx-4 mt-1">
                        {!! nl2br(e($event->information)) !!}
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

                <div class="md:flex">
                    <div class="mt-4 mr-12">
                        <x-jet-label for="max_people" value="定員数" />
                        <div class="px-4 mt-1">
                            {{ $event->max_people }}
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-jet-label class="justify-between md:flex"  for="is_visible" value="カレンダーに表示" />
                        @if($event->is_visible)
                            <div class="px-4 mt-1 text-red-500 bg-red-50">
                            表示中
                            </div>
                        @else
                            <div class="flex justify-around space-x-4">
                                <div class="px-4 mx-4 text-blue-500 bg-blue-50">
                                非表示
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="flex justify-end space-x-16">
                    @if($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
                        <form method="get" action="{{ route('events.edit', ['event' => $event->id ]) }}">
                            @csrf
                            <x-jet-button class="h-10 mt-2 w-28">
                                編集する
                            </x-jet-button>
                        </form>
                        <a href="#" data-id="{{ $event->id }}" onclick="deletePost(this)"
                            class="inline-flex items-center justify-center h-10 mt-2 font-semibold text-white bg-red-500 rounded-md w-28 hover:bg-red-600 focus:bg-red-600">
                            イベント削除
                        </a>
                        {{-- <form id="delete_{{ $event->id }}" method="post" action="{{ route('events.destroy', ['event' => $event->id ]) }}">
                            @csrf
                            @method('DELETE')
                        </form> --}}
                    @endif
                </div>
            </div>

            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="max-w-2xl py-4 mx-auto">
                    <div class="py-2 mb-2 text-lg font-bold text-center rounded bg-sky-200">予約状況</div>

                        <table class="w-full text-left whitespace-no-wrap table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 pt-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 rounded-l pb-1title-font">予約者</th>
                                    <th class="px-4 pt-3 pb-1 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font ">予約人数</th>
                                    <th class="px-4 pt-3 pb-1 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 rounded-r title-font">残りの予約枠</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($reservations as $reservation)
                                    @if(is_null($reservation['canceled_date']))
                                        <tr>
                                        <td class="px-4 py-3">{{ $reservation['name'] }}</td>
                                        <td class="px-4 py-3">{{ $reservation['number_of_people'] }}</td>
                                        <td class="px-4 py-3">{{ $event->max_people - $reservation['number_of_people'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach --}}
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>

</x-app-layout>
