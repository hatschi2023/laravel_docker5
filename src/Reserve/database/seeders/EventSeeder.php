<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $availableHour = rand(10, 18);
        if ($availableHour == 12) {
            $availableHour = rand(14, 18);
        }

        $minutes =[0, 30];
        $mKey = array_rand($minutes);
        $addHour = $this->faker->numberBetween(1,2);
        $dummyDate = Carbon::today();
        // $dummyDate = $this->faker->dateTimeThisMonth;
        $startDate = $dummyDate->setTime($availableHour, $minutes[$mKey]);
        $clone = clone $startDate;
        $endDate = $clone->modify('+'.$addHour.'hour');


        $eventNames = [
            'ジャズダンス',
            '卓球',
            'バトンサークル',
            'ボードゲーム',
            '算数サポート',
            '宿題サポート',
            '書写教室',
            'フリー'
        ];


        DB::table('events')->insert([
            [
                'name' => 'ジャズダンス',
                'information' => 'ジャズダンス
                 先生：\n',
                'max_people' => 10,
                'start_date' => '2024-09-01 14:00:00',
                'end_date' => '2024-09-01 15:00:00',
                'is_visible' => true,
            ],
            [
                'name' => '卓球',
                'information' => '卓球：\n',
                'max_people' => 10,
                'start_date' => '2024-09-03 15:00:00',
                'end_date' => '2024-09-03 16:00:00',
                'is_visible' => true,
            ],
            [
                'name' => 'バトンサークル',
                'information' => 'バトンサークル\先生：\n',
                'max_people' => 10,
                'start_date' => '2024-09-05 14:00:00',
                'end_date' => '2024-09-05 15:00:00',
                'is_visible' => true,
            ],
            [
                'name' => '算数サポート',
                'information' => '算数サポート\先生：\n',
                'max_people' => 10,
                'start_date' => '2024-09-10 16:00:00',
                'end_date' => '2024-09-10 17:00:00',
                'is_visible' => true,
            ],
            [
                'name' => '漢字サポート',
                'information' => '算数サポート\先生：\n',
                'max_people' => 10,
                'start_date' => '2024-09-13 16:00:00',
                'end_date' => '2024-09-13 17:00:00',
                'is_visible' => true,
            ],
            [
                'name' => '今日のおやつづくり',
                'information' => '今日のおやつづくり\先生：\n',
                'max_people' => 10,
                'start_date' => '2024-09-20 14:30:00',
                'end_date' => '2024-09-20 15:30:00',
                'is_visible' => true,
            ],
            [
                'name' => 'おりがみ',
                'information' => 'おりがみ：\n',
                'max_people' => 10,
                'start_date' => '2024-09-01 15:00:00',
                'end_date' => '2024-09-01 16:00:00',
                'is_visible' => true,
            ],
            [
                'name' => '工作',
                'information' => '工作：\n',
                'max_people' => 10,
                'start_date' => '2024-09-01 15:00:00',
                'end_date' => '2024-09-01 16:00:00',
                'is_visible' => true,
            ],



        ]);
    }
}



// class EventSeeder extends Seeder
// {
//     public function run()
//     {
//         $eventNames = [
//             'ジャズダンス',
//             '卓球',
//             'バトンサークル',
//             'ボードゲーム',
//             '算数サポート',
//             '宿題サポート',
//             '書写教室',
//             'フリー'
//         ];

//         // イベントの件数を指定
//         $totalEvents =100; // 例: 100件のイベントを作成
//         $existingEvents = [];
//         for ($i = 0; $i < $totalEvents; $i++) {
//             do {
//                 $eventName = $eventNames[array_rand($eventNames)];

//                 $availableHour = rand(10, 18);
//                 // 12時から13時の間にイベントを作成しない
//                 if ($availableHour == 12) {
//                     $availableHour = rand(10, 11) ?: rand(14, 18);
//                 }

//                 $minutes = [0, 30];
//                 $mKey = array_rand($minutes);
//                 $addHour = rand(1, 2);

//                 $startDate = \Carbon\Carbon::now()->startOfMonth()->addMinutes(rand(0, 600))->setTime($availableHour, $minutes[$mKey]);
//                 $endDate = $startDate->copy()->addHours($addHour);

//                 // 他のイベントと重ならないか確認
//                 $overlap = false;
//                 foreach ($existingEvents as $event) {
//                     if ($startDate->lt($event['end_date']) && $endDate->gt($event['start_date'])) {
//                         $overlap = true;
//                         break;
//                     }
//                 }

//             } while ($overlap || ($startDate->format('H') == 12 || $startDate->format('H') == 13));

//             Event::create([
//                 'name' => $eventName,
//                 'information' => $eventName . "の詳細情報です。\n先生：\n",
//                 'max_people' => rand(10, 30),
//                 'start_date' => $startDate,
//                 'end_date' => $endDate,
//                 'is_visible' => true,
//             ]);

//             $existingEvents[] = ['start_date' => $startDate, 'end_date' => $endDate];
//         }
//     }
// }
