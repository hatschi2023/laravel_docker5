<x-calendar-layout>
    <x-slot name="header">
        <div class="flex flex-auto">
            <!-- Logo -->
            <div class="flex items-center w-20 shrink-0">
                <a href="/">
                    <x-jet-application-mark class="block w-auto h-9" />
                </a>
            </div>
            <h2 class="px-12 pt-12 pb-4 text-xl font-semibold leading-tight text-gray-800">
                イベント詳細
            </h2>
        </div>
    </x-slot>

    <div class="pt-4 pb-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">


                <div class="max-w-2xl py-4 mx-auto">
                    <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="py-4 text-sm font-medium text-green-600 bg-green-50">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="get" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-jet-label for="event_name" value="イベント名" />
                        <div class="mx-4 mt-1">
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
                <div class="items-end justify-between md:flex">
                {{-- <div class="flex "> --}}
                    <div class="mt-4">
                        <x-jet-label for="max_people" value="定員数" />
                        <div class="mx-4 mt-4">
                            {{ $event->max_people }}
                        </div>
                    </div>
                    <div class="mt-4 ml-2">
                            @if($reservablePeople <= 0)
                                <span class="px-2 py-2 text-red-600 bg-red-100 text-s">このイベントは満員です</span>
                            @else
                            <x-jet-label for="reserved_people" value="予約可能人数" />
                            <select class="mt-1" name="reserved_people" id="">
                                @for ($i = 1; $i <= $reservablePeople; $i++ )
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            @endif
                        </div>
                        @if ($isReserved === null)
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            @if($reservablePeople > 0)
                            <x-jet-button class="mx-4">
                                予約する
                            </x-jet-button>
                            @endif
                        @else
                            {{-- <span class="px-2 py-2 text-red-600 bg-red-100 text-s">このイベントは既に予約済みです</span> --}}
                        @endif

                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>

</x-calendar-layout>
