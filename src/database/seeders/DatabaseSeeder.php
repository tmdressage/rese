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
        $this->call(UsersTableSeeder::class); //既存データと重複しないようmigrate:freshしてから実行すること
        $this->call(ShopsTableSeeder::class); //既存データと重複しないようmigrate:freshしてから実行すること
        User::factory(10)->create();
        Reservation::factory(10)->create();
        Favorite::factory(20)->create();
        Review::factory(100)->create();
    }
}
