<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'first_name'=>'Raissa',
            'middle_name'=>'Perez',
            'last_name'=>'Julia',
            'gender'=>'F',
            'marital_status'=>'Single',
            'dob'=>'2002-07-20',
            'email'=>'raissa@gmail.com',
            'phone_number'=>'0444411658',
            'address'=>'Hilinois_H258_road_23',
            'nationality'=>'portuguese',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        
        ]);
    }
}
