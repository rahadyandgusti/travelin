<?php

use Illuminate\Database\Seeder;

class unsurDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('unsur')->insert([
            [
                'name' => 'Rutin',
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Non Rutin',
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);

        $idRutin = \DB::table('unsur')->where('name','=','Rutin')->first()->id;

		\DB::table('unsur')->insert([
            [
                'name' => 'Rutin Ahli Daya',
                'parent_id' => $idRutin,
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);        
    }
}
