<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            予約済みのイベント一覧
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 overflow-hidden bg-white shadow-xl sm:rounded-xl">
                <section class="text-gray-600 body-font">

                    <div class="container px-5 py-4 mx-auto">
                        @if (session('status'))
                            <div class="px-4 py-4 text-sm font-medium text-green-600 bg-green-50">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="w-full mx-auto overflow-auto">
                            <table class="w-full text-left whitespace-no-wrap table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 rounded-l rounded-bl title-font">イベント名</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">開始日時</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">終了日時</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 rounded-r title-font">予約人数</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $fromTodayEvents as $event)
                                    <tr>
                                    <td class="px-4 py-3 text-blue-500"><a href="{{ route('mypage.show', ['id' => $event['id'] ]) }}">{{ $event['name'] }}</a></td>
                                    <td class="px-4 py-3">{{ $event['start_date'] }}</td>
                                    <td class="px-4 py-3">{{ $event['end_date'] }}</td>
                                    <td class="px-4 py-3">
                                            {{ $event['number_of_people'] }}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                      </div>
                    </div>
                  </section>

            </div>
        </div>
    </div>


    <div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 overflow-hidden bg-white shadow-xl sm:rounded-xl">
                <div class="container px-5 py-4 mx-auto">
                <h2 class="py-2 text-lg font-bold text-center rounded-l rounded-r bg-sky-200">過去のイベント一覧</h2>
                <section class="text-gray-600 body-font">

                        {{-- @if (session('status'))
                            <div class="px-4 py-4 text-sm font-medium text-green-600 bg-green-50">
                                {{ session('status') }}
                            </div>
                        @endif --}}

                        <div class="w-full mx-auto overflow-auto">
                            <table class="w-full text-left whitespace-no-wrap table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 rounded-bl title-font">イベント名</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">開始日時</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 title-font">終了日時</th>
                                    <th class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-200 rounded-r title-font">予約人数</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $pastEvents as $event)
                                <tr>
                                <td class="px-4 py-3 text-blue-500"><a href="{{ route('mypage.show', ['id' => $event['id'] ]) }}">{{ $event['name'] }}</a></td>
                                <td class="px-4 py-3">{{ $event['start_date'] }}</td>
                                <td class="px-4 py-3">{{ $event['end_date'] }}</td>
                                <td class="px-4 py-3">
                                        {{ $event['number_of_people'] }}
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                      </div>
                    </div>
                  </section>

            </div>
        </div>
    </div>
</x-app-layout>
