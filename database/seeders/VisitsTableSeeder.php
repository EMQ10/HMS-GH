<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('visits')->delete();
        
        \DB::table('visits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'patient_id' => 2,
                'hospital_id' => 1,
                'department_id' => 7,
                'nurse_id' => 4,
                'visit_type_id' => 4,
                'payment_type_id' => 3,
                'doctor_id' => 7,
                'receipt_number' => '001',
                'status' => 'pending',
                'created_at' => '2021-10-15 11:51:18',
                'updated_at' => '2021-10-19 09:47:01',
            ),
            1 => 
            array (
                'id' => 3,
                'patient_id' => 1,
                'hospital_id' => 1,
                'department_id' => 7,
                'nurse_id' => 4,
                'visit_type_id' => 4,
                'payment_type_id' => 3,
                'doctor_id' => 7,
                'receipt_number' => '002',
                'status' => 'pending',
                'created_at' => '2021-10-15 13:18:31',
                'updated_at' => '2021-10-15 13:18:31',
            ),
            2 => 
            array (
                'id' => 8,
                'patient_id' => 3,
                'hospital_id' => 1,
                'department_id' => 7,
                'nurse_id' => 4,
                'visit_type_id' => 4,
                'payment_type_id' => 3,
                'doctor_id' => 7,
                'receipt_number' => '003',
                'status' => 'pending',
                'created_at' => '2021-10-19 10:56:51',
                'updated_at' => '2021-10-27 12:23:17',
            ),
            3 => 
            array (
                'id' => 10,
                'patient_id' => 1,
                'hospital_id' => 1,
                'department_id' => 7,
                'nurse_id' => 4,
                'visit_type_id' => 5,
                'payment_type_id' => 4,
                'doctor_id' => 7,
                'receipt_number' => '5454',
                'status' => 'pending',
                'created_at' => '2021-10-19 11:45:05',
                'updated_at' => '2021-10-19 11:45:05',
            ),
            4 => 
            array (
                'id' => 11,
                'patient_id' => 2,
                'hospital_id' => 1,
                'department_id' => 7,
                'nurse_id' => 4,
                'visit_type_id' => 4,
                'payment_type_id' => 3,
                'doctor_id' => 7,
                'receipt_number' => '007',
                'status' => 'pending',
                'created_at' => '2021-10-21 13:19:12',
                'updated_at' => '2021-10-21 13:19:12',
            ),
            5 => 
            array (
                'id' => 12,
                'patient_id' => 4,
                'hospital_id' => 1,
                'department_id' => 7,
                'nurse_id' => 4,
                'visit_type_id' => 4,
                'payment_type_id' => 3,
                'doctor_id' => 7,
                'receipt_number' => '007',
                'status' => 'done',
                'created_at' => '2021-10-27 13:59:27',
                'updated_at' => '2021-10-27 14:04:35',
            ),
        ));
        
        
    }
}