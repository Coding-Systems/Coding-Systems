<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HouseTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MvtPointsTableSeeder::class);
        $this->call(ResultTestSeeder::class);
        $this->call(PromoTableSeeder::class);

    }
}
