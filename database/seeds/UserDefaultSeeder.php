<?php

use Illuminate\Database\Seeder;

class UserDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'password' => bcrypt('123456'),
                'email' => 'superadmin@admin.com',
                'username' => 'superadmin',
                'name' => 'Superadmin',
                'group' => 'superadmin',
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'password' => bcrypt('123456'),
                'email' => 'keuangan@admin.com',
                'username' => 'keuangan',
                'name' => 'Admin Keuangan',
                'group' => 'keuangan',
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'password' => bcrypt('123456'),
                'email' => 'sdm@admin.com',
                'username' => 'sdm',
                'name' => 'Admin SDM',
                'group' => 'sdm',
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'password' => bcrypt('123456'),
                'email' => 'logum@admin.com',
                'username' => 'logum',
                'name' => 'Admin Logum',
                'group' => 'logum',
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
