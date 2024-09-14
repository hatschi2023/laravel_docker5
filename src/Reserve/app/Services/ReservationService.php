<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Services\ReservationService;

class ReservationService
{
    public static function countReservablePeople($event)
    {
        $reservedPeople = DB::table('reservations')
            ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
            ->whereNull('deleted_at')
            ->whereNull('canceled_date')
            ->groupBy('event_id')
            ->having('event_id', $event->id)
            ->first();

        if (!is_null($reservedPeople)) {
            $reservablePeople = $event->max_people - $reservedPeople->number_of_people;
        } else {
            $reservablePeople = $event->max_people;
        }
        return $reservablePeople;
    }
}
