<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dentistry',
                'hospital_id' => 2,
                'created_at' => '2021-09-16 19:55:23',
                'updated_at' => '2021-09-21 23:30:30',
                'status' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Nephrology',
                'hospital_id' => 1,
                'created_at' => '2021-09-16 19:55:24',
                'updated_at' => '2021-09-16 19:55:24',
                'status' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dermatology',
                'hospital_id' => 1,
                'created_at' => '2021-09-16 19:55:24',
                'updated_at' => '2021-09-16 19:55:24',
                'status' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Neurology',
                'hospital_id' => 2,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-09-16 19:55:25',
                'status' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Ophthalmology',
                'hospital_id' => 1,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-10-03 04:02:46',
                'status' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Orthopedics',
                'hospital_id' => 1,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-09-16 19:55:25',
                'status' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Cardiology',
                'hospital_id' => 1,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-10-07 00:56:41',
                'status' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Gynecology',
                'hospital_id' => 2,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-09-16 19:55:25',
                'status' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Hematology',
                'hospital_id' => 1,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-09-16 19:55:25',
                'status' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Oncology',
                'hospital_id' => 1,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-09-21 23:43:47',
                'status' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Urology',
                'hospital_id' => 2,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-09-16 19:55:25',
                'status' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Physiotherapy',
                'hospital_id' => 2,
                'created_at' => '2021-09-16 19:55:25',
                'updated_at' => '2021-09-16 19:55:25',
                'status' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'New Department',
                'hospital_id' => 2,
                'created_at' => '2021-09-21 19:31:19',
                'updated_at' => '2021-09-21 23:28:58',
                'status' => 1,
            ),
            13 => 
            array (
                'id' => 17,
                'name' => 'Out Patient Department',
                'hospital_id' => 1,
                'created_at' => '2021-10-07 11:07:35',
                'updated_at' => '2021-10-07 11:07:35',
                'status' => 1,
            ),
            14 => 
            array (
                'id' => 18,
                'name' => 'New Department 7',
                'hospital_id' => 3,
                'created_at' => '2021-10-21 11:37:13',
                'updated_at' => '2021-10-21 11:37:13',
                'status' => 1,
            ),
        ));
        
        
    }
}