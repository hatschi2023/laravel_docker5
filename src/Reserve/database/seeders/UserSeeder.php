<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Hr;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('pass123'),
                'role' => 1
            ],
            [
                'name' => '管理者',
                'email' => 'manager@test.com',
                'password' => Hash::make('pass123'),
                'role' => 5
            ],
            [
                'name' => 'てすと',
                'email' => 'test@test.com',
                'password' => Hash::make('pass123'),
                'role' => 9
            ],
            [
                'name' => '健太',
                'email' => 'test1@test.com',
                'password' => Hash::make('pass123'),
                'role' => 9
            ],
            [
                'name' => 'ゆみ',
                'email' => 'test2@test.com',
                'password' => Hash::make('pass123'),
                'role' => 9
            ],
            [
                'name' => 'ピーコ',
                'email' => 'test3@test.com',
                'password' => Hash::make('pass123'),
                'role' => 9
            ],
            [
                'name' => 'あいこ',
                'email' => 'test4@test.com',
                'password' => Hash::make('pass123'),
                'role' => 9
            ],
            [
                'name' => 'totoro',
                'email' => 'test5@test.com',
                'password' => Hash::make('pass123'),
                'role' => 9
            ],

        ]);
    }
}
