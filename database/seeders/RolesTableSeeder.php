<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'created_at' => '2021-09-15 03:30:55',
                'updated_at' => '2021-09-15 03:30:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Doctor',
                'created_at' => '2021-09-15 03:30:55',
                'updated_at' => '2021-09-15 03:30:55',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Nurse',
                'created_at' => '2021-09-15 03:30:55',
                'updated_at' => '2021-09-15 03:30:55',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Receptionist',
                'created_at' => '2021-09-15 03:30:55',
                'updated_at' => '2021-09-15 03:30:55',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Super Admin',
                'created_at' => '2021-10-21 07:11:42',
                'updated_at' => '2021-10-21 07:11:42',
            ),
        ));
        
        
    }
}