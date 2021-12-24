<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['First Time', 'New Issue', 'Review'] ;

        foreach ($types as $type){
            DB::table('visit_types')->insert([
                'type' => $type,
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }
        
    }
}
