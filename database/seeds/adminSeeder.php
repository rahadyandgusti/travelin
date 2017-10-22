<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'name' => 'Admin',
        	'username' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456')
        ]);
    }
}
