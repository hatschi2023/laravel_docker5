<div>
    <div class="pt-4 pb-2 text-sm text-center bg-gray-200">
        日付を選択してください。本日から最大30日先まで選択できます。
        <input id="calendar" class="block mx-auto mt-1 bg-white rounded" type="text" name="calendar" value="{{ $currentDate }}"
        wire:change="getDate($event.target.value)" />
        <div class="mx-10 font-bold text-right text-red-500">※予約が満員のイベント</div>
    </div>

    <div class="flex mx-auto">
        <div class="pl-4 bg-gray-200"></div>
        <x-calendar-time />

        @for ($i = 0; $i < 7; $i++)
        <div class="w-32">
            <div class="px-2 py-1 text-center bg-gray-100 border border-gray-200">{{ $currentWeek[$i]['day'] }}</div>
            <div class="px-2 py-1 text-center bg-gray-100 border border-gray-200">{{ $currentWeek[$i]['dayOfWeek'] }}</div>

                @for ($j = 0; $j < 18; $j++)
                    {{-- １週間通じてイベントがない場合をチェック --}}
                    @if($events->isNotEmpty())
                        @php
                            //firstWhereで条件にあう1つ目を返す。なければnull
                            $event = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . " " . \Constant::EVENT_TIME[$j]);
                        @endphp
                        @if(is_null($event))
                            <div class="h-8 px-2 py-1 border border-gray-200"></div>
                            @continue
                        @endif
                        @if(!is_null($event->deleted_at))
                            <div class="h-8 px-2 py-1 border border-gray-200"></div>
                            @continue
                        @endif
                        @php
                            $eventId = $event->id;
                            $eventName = $event->name;
                            $eventInfo = \App\Models\Event::with(['reservations'=> function($query){
                                $query->whereNull('deleted_at') // 削除されていない予約
                                ->whereNull('canceled_date'); // キャンセルされていない予約
                                }])
                                    ->where('id', $eventId)
                                    ->first();

                            // 予約人数がイベントの定員数に達しているかを判定する
                            $reservedPeopleCount = $eventInfo->reservations->sum('number_of_people');
                            $isFullReserved = $reservedPeopleCount >= $eventInfo->max_people;
                            //予約可能人数
                            //$reservablePeopleCount = $eventInfo->max_people - $reservedPeopleCount;

                            $eventPeriod = \Carbon\Carbon::parse($eventInfo->start_date)->diffInMinutes($eventInfo->end_date) / 30 - 1;//イベント名に1ます（30分）使用するため-1

                            //ログインユーザーの最新の予約状態を取得
                            $latestReservation = $eventInfo->reservations
                            ->where('user_id', Auth::id())
                            ->sortByDesc('created_at')
                            ->first();
                            $isUserReserved = $latestReservation && is_null($latestReservation->canceled_date); //trueなら予約中
                            $isCanceled = $latestReservation && !is_null($latestReservation->canceled_date); //trueならキャンセル済
                        @endphp

                        {{-- イベント名＋対象マスに背景色設定 --}}
                        <a href="{{ route('events.detail', ['id' => $eventId]) }}">
                            @if (!$isFullReserved)
                                <div class="py-1 px-2 h-8 border border-gray-200 text-s {{ $isUserReserved ?  ($isCanceled ? 'bg-cyan-100' : 'bg-lime-200') : 'bg-cyan-100' }}">
                                    {{ $eventName }}
                                </div>
                            @else
                                <div class="py-1 px-2 h-8 border text-red-500 border-gray-200 text-s {{ $isUserReserved ?  ($isCanceled ? 'bg-cyan-100' : 'bg-lime-200') : 'bg-cyan-100' }}">
                                    {{ $eventName }}
                                </div>
                            @endif
                        </a>
                        {{-- イベントが30分以上のとき対象マスに背景色設定 --}}
                        @if ( $eventPeriod > 0 )
                            @for($k = 0; $k < $eventPeriod ; $k++)
                                <div class="h-8 px-2 py-1 border border-gray-200 text-xs
                                {{ $isUserReserved ?  ($isCanceled ? 'bg-cyan-100' : 'bg-lime-200') : 'bg-cyan-100' }}">
                                </div>
                            @endfor
                            @php $j += $eventPeriod @endphp
                        @endif


                    @else
                        <div class="h-8 px-2 py-1 border border-gray-200"></div>
                    @endif
                @endfor
            </div>
        @endfor
        <div class="pl-4 bg-gray-200"></div>
    </div>
    <div class="pt-4 bg-gray-200"></div>
    </div>
