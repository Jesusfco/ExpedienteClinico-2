<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'JESUS FCO',
            'email' => 'jfcr@live.com',
            'password' => bcrypt('secret'),
            'patern' => 'RODRIGUEZ',
            'matern' => ' ',
            'gender' => 1,
            'address_id' => 1,
            'personal_data_id' => 1,
            'user_type' => 4,

        ]);

        DB::table('addresses')->insert([ ]);
        DB::table('personal_datas')->insert([ ]);        
    }
}
