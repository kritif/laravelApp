<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->truncate();
        $faker = Factory::create();
        $movies = [];
        for($i=0; $i < 1000; $i++) {
            $movies[] = [
                'title' => $faker->words($faker->numberBetween(1,3), true),
                'description' => $faker->sentence(),
                'game_related_id' => $faker->numberBetween(1,1000)
            ];
        };

        DB::table('movies')->insert($movies);
    }
}
