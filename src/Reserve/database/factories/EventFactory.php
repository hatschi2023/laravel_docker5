<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class EventFactory extends Factory
{
    public function definition()
    {
        // イベント名と詳細情報を対応させる
        $events = [
            'ジャズダンス' => '先生：田中太郎<br>概要：初心者歓迎のジャズダンス教室です。',
            '卓球' => '先生：鈴木花子<br>概要：みんなで楽しく卓球をしましょう。',
            'バトンサークル' => '先生：佐藤次郎<br>概要：バトンを使ったダンスパフォーマンスを学びます。',
            'ボードゲーム' => '先生：中村由美<br>概要：人気のボードゲームをみんなで楽しみましょう。',
            '算数サポート' => '先生：山田健一<br>概要：小学生向けの算数の補習授業です。<br>メンバー同士でお互いに分からないところを教えっこします。<br>算数を教えるのが得意な子も歓迎！',
            '宿題サポート' => '先生：林美奈子<br>概要：宿題を一緒に解決しましょう。<br>メンバー同士でお互いに分からないところを教えっこします。',
            '書写教室' => '先生：森昭彦<br>概要：美しい書を書くための教室です。',
            '★わくわくフリータイムA' => '先生：島直樹<br>概要：集まったメンバーで自由に提案して楽しい時間をつくります。',
            '★わくわくフリータイムB' => '先生：香川麻美<br>概要：集まったメンバーで自由に提案して楽しい時間をつくります。',
            '★わくわくフリータイムC' => '先生：山口陽子<br>概要：集まったメンバーで自由に提案して楽しい時間をつくります。',
            'プログラミング教室' => '先生：佐藤和夫<br>概要：プログラミングの基礎から学べます。初心者大歓迎！',
            '英会話クラブ' => '先生：山本さくら<br>概要：日常英会話を楽しく学びましょう。',
            'ギター教室' => '先生：大野孝之<br>概要：ギターの弾き方を基礎から学びます。',
            '料理教室' => '先生：田辺まさし<br>概要：簡単なレシピで料理を学びましょう。みんなで作って楽しみましょう。',
            '科学実験教室' => '先生：小川美智子<br>概要：身近なもので楽しい科学実験をしましょう。',
            '体操教室' => '先生：遠藤正一<br>概要：全身を使った体操で体力をつけましょう。初心者も歓迎です！',
            'なわとびクラブ' => '先生：高橋正美<br>概要：みんなで楽しくなわとびを練習しましょう。体力づくりにも最適です！',
            'イラスト' => '先生：近藤彩香<br>概要：自分だけのイラストを描いてみましょう。初心者も経験者も大歓迎です！',
        ];

        // イベント名をランダムに選択
        $eventName = array_rand($events);
        $eventInfo = trim($events[$eventName]);

        // データ作成開始日を指定
        $specifiedStartDate = Carbon::create(2024, 9, 1); // 任意の日付に変更
        $startDate = (clone $specifiedStartDate)->subMonth(); // 開始日の1ヶ月前

        // 1ヶ月前から3ヶ月後の範囲でランダムな日付を選択
        $randomDate = (clone $startDate)->addDays(rand(0, 90));
        $weekday = $randomDate->dayOfWeek;

        // 日曜日はスキップ
        if ($weekday === Carbon::SUNDAY) {
            return $this->definition(); // 日曜日なら別の日付を選び直す
        }

        if ($weekday >= Carbon::MONDAY && $weekday <= Carbon::FRIDAY) {
            // 平日：14時から18時の間
            $availableHour = rand(15, 17);
            $endHourLimit = 18;
        } elseif ($weekday === Carbon::SATURDAY) {
            // 土曜日：9時から17時の間（12〜14時を除く）
            $availableHours = array_merge(range(9, 11), range(14, 16));
            $availableHour = $availableHours[array_rand($availableHours)];
            $endHourLimit = 17;
        }

        // $minutes = [0, 30];
        $minutes = [0];

        $mKey = array_rand($minutes);
        $startDateTime = (clone $randomDate)->setTime($availableHour, $minutes[$mKey]);

        // イベントの所要時間を1時間以上に設定
        $eventDuration = 60; // 最低1時間
        $endDateTime = (clone $startDateTime)->addMinutes($eventDuration);

        // 終了時間が制限時間を超えないように調整
        if ($endDateTime->hour > $endHourLimit || ($endDateTime->hour == $endHourLimit && $endDateTime->minute > 0)) {
            // 終了時間が制限時間を超えないように調整
            $maxEventDuration = ($endHourLimit - $availableHour) * 60; // 最大イベント時間（分）
            if ($maxEventDuration < 60) {
                // 最大イベント時間が1時間未満の場合
                $eventDuration = $maxEventDuration;
                $endDateTime = (clone $startDateTime)->addMinutes($eventDuration);
            } else {
                // 通常の1時間〜2時間のイベント時間
                $eventDuration = min(120, $maxEventDuration); // 最大2時間
                $endDateTime = (clone $startDateTime)->addMinutes($eventDuration);
            }
        }

        return [
            'name' => $eventName,
            'information' => $eventInfo,
            'max_people' => $this->faker->numberBetween(1, 20),
            'start_date' => $startDateTime,
            'end_date' => $endDateTime,
            'is_visible' => true,
        ];
    }
}
