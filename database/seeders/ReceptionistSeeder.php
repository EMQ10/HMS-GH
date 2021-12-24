<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Nette\Utils\Random;

class ReceptionistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $genderForFaker = array('male','female');
        $nurseGender = array('M','F');
        $status = array('Married','Single','Divorced');

        for($i = 0; $i < 50; $i++){
            DB::table('receptionists')->insert([
                'first_name'=> $faker->firstName($gender=$genderForFaker[array_rand($genderForFaker, 1)]),
                'middle_name'=>$faker->firstName($gender=$gender),
                'last_name'=>$faker->lastName($gender=$gender),
                'gender'=>$string = $gender == 'male' ? 'M' : 'F',
                'marital_status'=> $status[array_rand($status, 1)],
                'dob'=>'1990-05-15',
                'email'=>$faker->safeEmail,
                'phone_number'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'nationality'=>'Ghanaian',
                'hospital_id'=>rand(1,2),                                                                            
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            
            ]);
        }
    }
}
