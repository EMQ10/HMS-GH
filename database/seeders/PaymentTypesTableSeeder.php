<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_types')->delete();
        
        \DB::table('payment_types')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Cash',
                'created_at' => '2021-10-15 03:53:31',
                'updated_at' => '2021-10-15 03:53:31',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Health Insurance',
                'created_at' => '2021-10-15 03:53:31',
                'updated_at' => '2021-10-15 03:53:31',
            ),
        ));
        
        
    }
}