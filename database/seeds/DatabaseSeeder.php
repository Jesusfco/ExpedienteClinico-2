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
            'name' => 'Admin',
            'email' => 'jfcr@live.com',
            'password' => bcrypt('secret'),
            'patern' => 'Admin',
            'matern' => 'Admin',
            'gender' => 1,
            'address_id' => 0,
            'personal_data_id' => 0,
            'user_type' => 4,

        ]);

    }
}
