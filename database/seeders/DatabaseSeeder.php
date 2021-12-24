<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(ConsultationsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(VisitsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(HospitalsTableSeeder::class);
        $this->call(InsurancesTableSeeder::class);
        $this->call(InsurancePatientTableSeeder::class);
        $this->call(PaymentTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(VisitTypesTableSeeder::class);
        $this->call(VitalsTableSeeder::class);
    }
}
