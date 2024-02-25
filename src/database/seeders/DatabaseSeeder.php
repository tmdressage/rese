<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Review;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShopsTableSeeder::class); //既存データと重複しないようmigrate:freshしてから実行する
        $this->call(UsersTableSeeder::class); //既存データと重複しないようmigrate:freshしてから実行する
        User::factory(30)->create();
        Reservation::factory(30)->create();
        Favorite::factory(30)->create();
        Review::factory(100)->create();
    }
}
