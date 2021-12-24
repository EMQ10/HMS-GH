<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employees')->delete();
        
        \DB::table('employees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'hospital_id' => 1,
                'first_name' => 'Emilie',
                'middle_name' => 'k',
                'last_name' => 'Quartey',
                'gender' => 'F',
                'educational_level' => 'Phd',
                'marital_status' => 'Married',
                'dob' => '2016-06-05',
                'phone_number' => '0221146325',
                'emergency_number' => NULL,
                'address' => 'Spintex_A111_road_1',
                'nationality' => 'Ghanaian',
                'image' => 'blank.png',
                'created_at' => '2021-09-29 06:06:02',
                'updated_at' => '2021-09-29 06:06:02',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'hospital_id' => 2,
                'first_name' => 'DEO',
                'middle_name' => 'OPTIMO',
                'last_name' => 'MAXIMO',
                'gender' => 'M',
                'educational_level' => 'Phd',
                'marital_status' => 'Married',
                'dob' => '2016-06-05',
                'phone_number' => '0543165184',
                'emergency_number' => NULL,
                'address' => 'Spintex_A111_road_2',
                'nationality' => 'Ivorian',
                'image' => 'blank.png',
                'created_at' => '2021-09-29 06:06:53',
                'updated_at' => '2021-09-29 06:06:53',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'hospital_id' => 1,
                'first_name' => 'Yves',
                'middle_name' => 'rock',
                'last_name' => 'Yeo',
                'gender' => 'M',
                'educational_level' => 'Phd',
                'marital_status' => 'Single',
                'dob' => '2016-06-05',
                'phone_number' => '0887965419',
                'emergency_number' => NULL,
                'address' => 'Spintex_A111_road_3',
                'nationality' => 'Tunisian',
                'image' => 'blank.png',
                'created_at' => '2021-09-29 06:08:31',
                'updated_at' => '2021-09-29 06:08:31',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'hospital_id' => 1,
                'first_name' => 'Sandra',
                'middle_name' => NULL,
                'last_name' => 'Turina',
                'gender' => 'F',
                'educational_level' => 'Master',
                'marital_status' => 'Single',
                'dob' => '2015-03-04',
                'phone_number' => '0887945279',
                'emergency_number' => NULL,
                'address' => 'Spintex_A111_road_4',
                'nationality' => 'Italian',
                'image' => 'blank.png',
                'created_at' => '2021-09-30 06:00:18',
                'updated_at' => '2021-09-30 06:00:18',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'hospital_id' => 2,
                'first_name' => 'Desmond',
                'middle_name' => 'eric',
                'last_name' => 'Oliver',
                'gender' => 'M',
                'educational_level' => 'Master',
                'marital_status' => 'Married',
                'dob' => '2014-09-05',
                'phone_number' => '0474545279',
                'emergency_number' => NULL,
                'address' => 'Spintex_A111_road_5',
                'nationality' => 'Gabonese',
                'image' => 'blank.png',
                'created_at' => '2021-09-30 06:02:20',
                'updated_at' => '2021-09-30 06:02:20',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 8,
                'hospital_id' => 1,
                'first_name' => 'Tommy',
                'middle_name' => NULL,
                'last_name' => 'Marion',
                'gender' => 'M',
                'educational_level' => 'Wassce',
                'marital_status' => 'Single',
                'dob' => '2021-10-04',
                'phone_number' => '0000000000',
                'emergency_number' => NULL,
                'address' => 'tommyadress_street_24',
                'nationality' => 'portuguese',
                'image' => '1633566665-18422.jpg',
                'created_at' => '2021-10-07 00:31:05',
                'updated_at' => '2021-10-07 00:31:05',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 9,
                'hospital_id' => 1,
                'first_name' => 'Henry',
                'middle_name' => 'Bon',
                'last_name' => 'Kofi',
                'gender' => 'M',
                'educational_level' => 'Phd',
                'marital_status' => 'Married',
                'dob' => '2021-09-27',
                'phone_number' => '0000000455',
                'emergency_number' => NULL,
                'address' => 'henryadress_street_58',
                'nationality' => 'Gabonese',
                'image' => '1633567910-285062.jpg',
                'created_at' => '2021-10-07 00:51:50',
                'updated_at' => '2021-10-07 00:51:50',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 10,
                'hospital_id' => 1,
                'first_name' => 'Kweku',
                'middle_name' => 'kwe',
                'last_name' => 'Mensah',
                'gender' => 'M',
                'educational_level' => 'Phd',
                'marital_status' => 'Single',
                'dob' => '2021-10-10',
                'phone_number' => '+254568745555',
                'emergency_number' => NULL,
                'address' => 'kweku_street_23',
                'nationality' => 'Ghanaian',
                'image' => '1634035383-375259.jpg',
                'created_at' => '2021-10-07 11:11:20',
                'updated_at' => '2021-10-12 11:27:53',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 11,
                'hospital_id' => 1,
                'first_name' => 'Mike',
                'middle_name' => NULL,
                'last_name' => 'Jefferson',
                'gender' => 'M',
                'educational_level' => 'Phd',
                'marital_status' => 'Single',
                'dob' => '2001-01-01',
                'phone_number' => '0225465565',
                'emergency_number' => NULL,
                'address' => 'mike_street_235',
                'nationality' => 'Ghanaian',
                'image' => 'blank.png',
                'created_at' => '2021-10-18 23:32:47',
                'updated_at' => '2021-10-18 23:32:47',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 13,
                'hospital_id' => 3,
                'first_name' => 'Ultimate',
                'middle_name' => NULL,
                'last_name' => 'Drew',
                'gender' => 'M',
                'educational_level' => 'Phd',
                'marital_status' => 'Married',
                'dob' => '1987-07-25',
                'phone_number' => '0789547100',
                'emergency_number' => NULL,
                'address' => 'Tema_N4309_road_1',
                'nationality' => 'Ghanaian',
                'image' => 'blank.png',
                'created_at' => '2021-10-21 07:21:26',
                'updated_at' => '2021-10-21 07:21:26',
            ),
        ));
        
        
    }
}