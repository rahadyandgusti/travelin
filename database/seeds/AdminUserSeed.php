<?php

use Illuminate\Database\Seeder;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Rahadyan',
                'email' => 'rahadyan.d.gusti@gmail.com',
                'password' => bcrypt('rahadyan'),
                'created_at' => \Carbon\Carbon::now(),
            ],[
                'name' => 'Hernanda',
                'email' => 'hernandaadis@gmail.com',
                'password' => bcrypt('hernanda'),
                'created_at' => \Carbon\Carbon::now(),
            ]
        	]);
    }
}
