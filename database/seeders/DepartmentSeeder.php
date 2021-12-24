<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab = array('Dentistry','Nephrology','Dermatology','Neurology','Ophthalmology','Orthopedics', 'Cardiology', 'Gynecology','Hematology','Oncology','Urology','Physiotherapy');

        for($i = 0; $i < sizeof($tab) ; $i++){
           
            DB::table('departments')->insert([
                'name'=>$tab[$i] ,
                'hospital_id'=>rand(1,2),
                'created_at'=>Carbon::now(),
                'updated_at'=> Carbon::now()

            ]);
        }
    }
}
