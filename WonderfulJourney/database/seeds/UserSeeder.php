<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'benedict',
                'email' => 'benedict@email.com',
                'password' => bcrypt('AAAaaa123'),
                'role' => 'Admin',
                'phone_number' => '321323123123',
                
            ],

            [
                'name' => 'elizabeth',
                'email' => 'elizabeth@email.com',
                'password' => bcrypt('AAAaaa123'),
                'role' => 'Admin',
                'phone_number' => '321323123123',
            ], 
            
            [
                'name' => 'drake setiawan',
                'email' => 'drake@email.com',
                'password' => bcrypt('AAAaaa123'),
                'role' => 'Member',
                'phone_number' => '321323123123',          
            ],
        ]);
    }
}
