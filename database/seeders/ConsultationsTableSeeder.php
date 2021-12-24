<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConsultationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('consultations')->delete();
        
        \DB::table('consultations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'visit_id' => 1,
                'vital_id' => 1,
                'diagnosis' => 'Fracture, Malaria',
                'complaints' => 'Headache, ribs pains',
                'advice' => 'Stop playing Rugby until you are healed.',
                'lab' => 'X-ray',
            'prescription' => 'Medicine A (2 tablets twice daily), Plaster cast',
                'created_at' => '2021-10-18 23:47:06',
                'updated_at' => '2021-10-19 17:02:49',
            ),
            1 => 
            array (
                'id' => 2,
                'visit_id' => 12,
                'vital_id' => 9,
                'diagnosis' => 'Malaria',
                'complaints' => 'Headache',
                'advice' => 'Drink more water',
                'lab' => 'scan',
                'prescription' => 'Paracetamol',
                'created_at' => '2021-10-27 14:03:57',
                'updated_at' => '2021-10-27 14:03:57',
            ),
        ));
        
        
    }
}