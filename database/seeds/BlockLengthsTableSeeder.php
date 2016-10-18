<?php

use Illuminate\Database\Seeder;

class BlockLengthsTableSeeder extends Seeder
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
        for($i = 0; $i <= $limit; $i++){
            DB::table('block_lengths')->insert([
                'length' => $faker->numberBetween($min = 1, $max = 100),
                'block_id' => $i+1,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
