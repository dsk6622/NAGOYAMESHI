<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = new User();
        $user->name = '侍 太郎';
        $user->email = 'taro.samurai@example.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = '侍 花子';
        $user->email = 'hanako.samurai@example.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->save();

        User::factory()->count(30)->create();
    }
}
