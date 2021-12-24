<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'Emilie',
                'email' => 'emilie.k.quartey@gmail.com',
                'password' => '$2y$10$PdY./mxWGIcGF2hY7W0zief9yzydXwkwM1tdsBrn2FrDzH1DBeW92',
                'role_id' => 1,
                'status' => 1,
                'department_id' => NULL,
                'remember_token' => '1UMoHVwfRpZeZEleFA3zRxyD0MKKx8hnFHr7e9WJrpCIZc4HltHiIJWxw2eL',
                'created_at' => '2021-09-15 03:31:24',
                'updated_at' => '2021-10-27 18:58:24',
                'last_seen' => '2021-10-27 18:58:24',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'DEO',
                'email' => 'assemiendomss@gmail.com',
                'password' => '$2y$10$9fdd8hYHU.etgOXu/7m1SOQufCuqqsPkewn3U2BeYvyua8BnSzPsW',
                'role_id' => 1,
                'status' => 1,
                'department_id' => NULL,
                'remember_token' => 'NB8x7z3B1HW5qdMGTBiM3Y0XIMqAvtYXage6vZXDEC2pmEZDKzqyljdyfjzf',
                'created_at' => '2021-09-15 03:33:18',
                'updated_at' => '2021-10-27 11:07:28',
                'last_seen' => '2021-10-27 11:07:28',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'Yves',
                'email' => 'agivoc3@gmail.com',
                'password' => '$2y$10$GWhI/XCs6GQhj24ZGYGWl.AK2QYch1XJbrCXwQPxrKP2ToQSeoBL2',
                'role_id' => 2,
                'status' => 1,
                'department_id' => 3,
                'remember_token' => NULL,
                'created_at' => '2021-09-17 03:16:33',
                'updated_at' => '2021-10-28 11:10:22',
                'last_seen' => '2021-10-28 11:10:22',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'Sandra',
                'email' => 'sandra@gmail.com',
                'password' => '$2y$10$xgCwRJqhC6osZ7Tizcj9cu0FepZWNNeyj7iaJT5pMgmr7OnsWeeyu',
                'role_id' => 3,
                'status' => 1,
                'department_id' => 7,
                'remember_token' => NULL,
                'created_at' => '2021-09-30 05:56:08',
                'updated_at' => '2021-12-20 19:02:21',
                'last_seen' => '2021-12-20 19:02:21',
            ),
            4 => 
            array (
                'id' => 5,
                'username' => 'Desmond',
                'email' => 'desmond@gmail.com',
                'password' => '$2y$10$30aAvJwcjI.KaB9BlY1aj.lxekPhfPokWrVqintpZj854RtO7hugq',
                'role_id' => 3,
                'status' => 1,
                'department_id' => 12,
                'remember_token' => NULL,
                'created_at' => '2021-09-30 05:57:03',
                'updated_at' => '2021-09-30 05:57:03',
                'last_seen' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'username' => 'Tommy',
                'email' => 'kwekuasimatsi@gmail.com',
                'password' => '$2y$10$wGn/5Ec1QgW9jszVZ1dEcuQftwPOY08L0g3sIW7/wCGFO7rO.uR8K',
                'role_id' => 4,
                'status' => 1,
                'department_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-10-07 00:31:05',
                'updated_at' => '2021-10-28 10:22:17',
                'last_seen' => '2021-10-28 10:22:17',
            ),
            6 => 
            array (
                'id' => 9,
                'username' => 'Henry',
                'email' => 'henry@gmail.com',
                'password' => '$2y$10$BpDCIT2vI12CE6kN5y6.beyVKNB/n2vMGK70IpRtnTulyvusSSf4O',
                'role_id' => 2,
                'status' => 1,
                'department_id' => 7,
                'remember_token' => NULL,
                'created_at' => '2021-10-07 00:51:50',
                'updated_at' => '2021-10-27 19:48:07',
                'last_seen' => '2021-10-27 19:48:07',
            ),
            7 => 
            array (
                'id' => 10,
                'username' => 'Aiti',
                'email' => 'aiti@gmail.com',
                'password' => '$2y$10$n60USitT8Oa6IgDh/qHWyuZRyv2.W8gS.mEzlY5fVFttP5PZQ4zXu',
                'role_id' => 3,
                'status' => 1,
                'department_id' => 17,
                'remember_token' => NULL,
                'created_at' => '2021-10-07 11:11:19',
                'updated_at' => '2021-10-13 09:18:52',
                'last_seen' => '2021-10-13 09:18:52',
            ),
            8 => 
            array (
                'id' => 11,
                'username' => 'Mike',
                'email' => 'mike@gmail.com',
                'password' => '$2y$10$zXVlGKQp/JNtu09UJDHJR.Dgc3ZC496Jn1nEJY4ayZKtWxJf5LfJa',
                'role_id' => 1,
                'status' => 1,
                'department_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-10-18 23:32:46',
                'updated_at' => '2021-10-18 23:32:46',
                'last_seen' => NULL,
            ),
            9 => 
            array (
                'id' => 13,
                'username' => 'Ultimate ',
                'email' => 'ultimate@gmail.com',
                'password' => '$2y$10$8uaZTMy91hegyS.H2fj6VuTWOdhkp4.ygdmOxJmdCgVpqUOdo08Mu',
                'role_id' => 5,
                'status' => 1,
                'department_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-10-21 07:12:09',
                'updated_at' => '2021-10-27 19:01:25',
                'last_seen' => '2021-10-27 19:01:25',
            ),
        ));
        
        
    }
}