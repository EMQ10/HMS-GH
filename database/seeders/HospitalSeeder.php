<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitals')->insert([
            'name'=> 'Health Care (Ministry Of Health)',
            'location'=> 'Tema',
            'created_at' => Carbon::now(),
            'updated_at'=>  Carbon::now()
        ]);
    }
}
