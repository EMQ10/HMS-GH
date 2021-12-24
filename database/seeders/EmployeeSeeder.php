<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

    class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'user_id'=>13,
            'hospital_id'=>3,
            'first_name'=>'Ultimate',
            // 'middle_name'=>'eric',
            'last_name'=>'Drew',
            'gender'=>'M',
            'educational_level'=>'Phd',
            'marital_status'=>'Married',
            'dob'=>'1987-07-25',
            'phone_number'=>'0789547100',
            'address'=>'Tema_N4309_road_1',
            'nationality'=>'Ghanaian',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        
        ]);
    }
}
