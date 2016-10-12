<?php

use Illuminate\Database\Seeder;

class BlockTypesTableSeeder extends Seeder
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
            DB::table('block_types')->insert([
                'type' => $faker->word,
                'block_id' => $i+1,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
