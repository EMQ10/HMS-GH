<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hospitals')->delete();
        
        \DB::table('hospitals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Healed In Advance',
                'location' => 'OSU',
                'created_at' => '2021-09-15 03:10:26',
                'updated_at' => '2021-09-15 03:10:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Trust Us',
                'location' => 'Legon',
                'created_at' => '2021-09-15 03:13:19',
                'updated_at' => '2021-09-15 03:13:19',
            ),
            2 => 
            array (
                'id' => 3,
            'name' => 'Health Care (Ministry Of Health)',
                'location' => 'Tema',
                'created_at' => '2021-10-21 07:16:49',
                'updated_at' => '2021-10-21 07:16:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Victory',
                'location' => 'Achimota',
                'created_at' => '2021-10-21 09:42:32',
                'updated_at' => '2021-10-21 09:53:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Military',
                'location' => 'Dzorwulu',
                'created_at' => '2021-10-21 11:24:00',
                'updated_at' => '2021-10-21 11:24:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'new hospital',
                'location' => 'Danfe',
                'created_at' => '2021-10-27 13:44:56',
                'updated_at' => '2021-10-27 13:44:56',
            ),
        ));
        
        
    }
}