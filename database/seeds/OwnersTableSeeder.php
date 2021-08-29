<?php

use Illuminate\Database\Seeder;

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
