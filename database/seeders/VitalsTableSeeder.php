<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VitalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vitals')->delete();
        
        \DB::table('vitals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'visit_id' => 1,
                'temperature' => 37.5,
                'bp_systolic' => 30,
                'bp_diastolic' => 25,
                'weight' => 76.0,
                'height' => 4.5,
                'heart_rate' => 12,
                'created_at' => '2021-10-16 07:44:12',
                'updated_at' => '2021-10-16 11:39:14',
            ),
            1 => 
            array (
                'id' => 4,
                'visit_id' => 3,
                'temperature' => 38.7,
                'bp_systolic' => 115,
                'bp_diastolic' => 60,
                'weight' => 94.0,
                'height' => 5.6,
                'heart_rate' => 110,
                'created_at' => '2021-10-16 11:13:06',
                'updated_at' => '2021-10-16 11:13:06',
            ),
            2 => 
            array (
                'id' => 5,
                'visit_id' => 8,
                'temperature' => 36.0,
                'bp_systolic' => 56,
                'bp_diastolic' => 70,
                'weight' => 200.0,
                'height' => 8.0,
                'heart_rate' => 45,
                'created_at' => '2021-10-19 11:07:07',
                'updated_at' => '2021-10-19 11:22:18',
            ),
            3 => 
            array (
                'id' => 7,
                'visit_id' => 10,
                'temperature' => 30.0,
                'bp_systolic' => 130,
                'bp_diastolic' => 46,
                'weight' => 45.0,
                'height' => 4.0,
                'heart_rate' => 5,
                'created_at' => '2021-10-19 11:59:01',
                'updated_at' => '2021-10-19 11:59:01',
            ),
            4 => 
            array (
                'id' => 8,
                'visit_id' => 11,
                'temperature' => 37.5,
                'bp_systolic' => 56,
                'bp_diastolic' => 70,
                'weight' => 60.0,
                'height' => 4.5,
                'heart_rate' => 160,
                'created_at' => '2021-10-21 13:20:22',
                'updated_at' => '2021-10-21 13:20:22',
            ),
            5 => 
            array (
                'id' => 9,
                'visit_id' => 12,
                'temperature' => 36.0,
                'bp_systolic' => 56,
                'bp_diastolic' => 60,
                'weight' => 76.0,
                'height' => 5.3,
                'heart_rate' => 12,
                'created_at' => '2021-10-27 14:00:37',
                'updated_at' => '2021-10-27 14:00:37',
            ),
        ));
        
        
    }
}