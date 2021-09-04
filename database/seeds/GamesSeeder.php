<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Carbon;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->truncate();
        $faker = Factory::create();
        $games = [];
        for($i=0; $i < 1000; $i++) {
            $games[] = [
                'title' => $faker->words($faker->numberBetween(1,3), true),
                'description' => $faker->sentence(),
                'published' => $faker->date(),
                'publi_id' => $faker->numberBetween(1,6),
                'genre_id' => $faker->numberBetween(1,5),
                'score' => $faker->numberBetween(0,10),
                'lang' => $faker->randomElement(['pl','en','ge','ru']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        };

        DB::table('games')->insert($games);

    }
}
