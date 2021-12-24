<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'employee_id'=>2,
            'hospital_id'=>2,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        
        ]);
    }
}
