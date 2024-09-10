<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            本日以降のイベント一覧
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">

                    <div class="container px-5 py-4 mx-auto">
                        @if (session('status'))
                            <div class="px-4 py-4 text-sm font-medium text-green-600 bg-green-50">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="flex justify-between">
                            <button onclick="location.href='{{ route('events.past') }}'" class="flex px-6 py-2 mb-4 ml-auto text-white bg-green-500 border-0 rounded focus:outline-none hover:bg-green-600">過去のイベント一覧</button>

                            <button onclick="location.href='{{ route('events.create') }}'" class="flex px-6 py-2 mb-4 ml-auto text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">新規登録</button>
                        </div>

                        <div class="w-full mx-auto overflow-auto">
                            <table class="w-full text-left whitespace-no-wrap table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 rounded-tl rounded-bl title-font">イベント名</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">開始日時</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">終了日時</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">予約人数</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">定員</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-center text-gray-900 bg-gray-200 rounded-tr rounded-br title-font">表示</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $events as $event)
                                <tr>
                                <td class="px-4 py-3 text-blue-500"><a href="{{ route('events.show', [ 'event' => $event->id ]) }}">{{ $event->name }}</a></td>
                                <td class="px-4 py-3">{{ $event->start_date }}</td>
                                <td class="px-4 py-3">{{ $event->end_date }}</td>
                                <td class="px-4 py-3">
                                    @if (is_null($event->number_of_people))
                                        0
                                    @else
                                        {{ $event->number_of_people }}
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $event->max_people }}</td>
                                <td class="px-4 py-3 text-center">{{ $event->is_visible  === 1 ? '〇' : '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            {{ $events->links() }}
                      </div>
                      <div class="flex items-center justify-between w-3/4 pl-4 mx-auto mt-4 lg:w-2/3">

                      </div>
                    </div>
                  </section>

            </div>
        </div>
    </div>
</x-app-layout>
