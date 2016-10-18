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
                'width' => 1030,
                'depth' => 1290,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
 }
