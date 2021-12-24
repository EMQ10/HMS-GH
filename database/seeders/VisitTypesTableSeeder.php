<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisitTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('visit_types')->delete();
        
        \DB::table('visit_types')->insert(array (
            0 => 
            array (
                'id' => 4,
                'type' => 'First Time',
                'created_at' => '2021-10-15 03:53:36',
                'updated_at' => '2021-10-15 03:53:36',
            ),
            1 => 
            array (
                'id' => 5,
                'type' => 'New Issue',
                'created_at' => '2021-10-15 03:53:36',
                'updated_at' => '2021-10-15 03:53:36',
            ),
            2 => 
            array (
                'id' => 6,
                'type' => 'Review',
                'created_at' => '2021-10-15 03:53:37',
                'updated_at' => '2021-10-15 03:53:37',
            ),
        ));
        
        
    }
}