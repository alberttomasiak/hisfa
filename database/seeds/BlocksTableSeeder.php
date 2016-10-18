<?php

use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        $limit = 9;

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('blocks')->truncate();

        for($i = 0; $i <= $limit; $i++){
            DB::table('blocks')->insert([
                'width' => $faker->numberBetween($min = 1, $max = 100),
                'depth' => $faker->numberBetween($min = 1, $max = 100),
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
 }
