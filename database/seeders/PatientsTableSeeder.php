<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patients')->delete();
        
        \DB::table('patients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Kofi',
                'middle_name' => NULL,
                'last_name' => 'Asamoah',
                'gender' => 'M',
                'marital_status' => 'Single',
                'dob' => '2001-09-27',
                'occupation' => 'firefighter',
                'email' => 'patient1dolph@gmail.com',
                'phone_number' => '+233855554',
                'emergency_number' => '001122334488',
                'address' => 'patient1address_street_55',
                'registration_number' => 'P-1689-9031-1305',
                'nationality' => 'Togolese',
                'created_at' => '2021-10-07 04:29:53',
                'updated_at' => '2021-10-12 13:53:27',
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'John',
                'middle_name' => 'Kwame',
                'last_name' => 'Yeboah',
                'gender' => 'F',
                'marital_status' => 'Single',
                'dob' => '1997-08-18',
                'occupation' => 'hair dresser',
                'email' => 'malta@gmail.com',
                'phone_number' => '0000011111',
                'emergency_number' => NULL,
                'address' => 'maltaddress_street_97',
                'registration_number' => 'P-2011-1783-6514',
                'nationality' => 'Malian',
                'created_at' => '2021-10-07 05:53:47',
                'updated_at' => '2021-10-07 05:53:47',
            ),
            2 => 
            array (
                'id' => 3,
                'first_name' => 'Benjamin',
                'middle_name' => 'Doe',
                'last_name' => 'Donkor',
                'gender' => 'M',
                'marital_status' => 'Married',
                'dob' => '1975-10-06',
                'occupation' => 'firefighter',
                'email' => 'patient3@gmail.com',
                'phone_number' => '88858777777',
                'emergency_number' => NULL,
                'address' => 'patient1address_street_55',
                'registration_number' => 'P-6052-3132-7354',
                'nationality' => 'Gabonese',
                'created_at' => '2021-10-07 11:14:55',
                'updated_at' => '2021-10-07 11:14:55',
            ),
            3 => 
            array (
                'id' => 4,
                'first_name' => 'New',
                'middle_name' => NULL,
                'last_name' => 'John',
                'gender' => 'M',
                'marital_status' => 'Single',
                'dob' => '2022-02-14',
                'occupation' => 'teacher',
                'email' => 'johnnew@gmail.com',
                'phone_number' => '+23387964411',
                'emergency_number' => NULL,
                'address' => 'john_street_235',
                'registration_number' => 'P-4251-4457-255',
                'nationality' => 'Ghanaian',
                'created_at' => '2021-10-27 13:51:52',
                'updated_at' => '2021-10-27 13:51:52',
            ),
        ));
        
        
    }
}