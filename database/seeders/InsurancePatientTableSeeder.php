<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InsurancePatientTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('insurance_patient')->delete();
        
        
        
    }
}