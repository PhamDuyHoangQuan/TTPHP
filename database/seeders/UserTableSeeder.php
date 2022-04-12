<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $data = [
            [
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('12345'),
            ],
            [
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('12345'),
            ],
            [
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('12345'),
            ],
        ];
        DB::table('loyal_customers')->insert($data);
    }
}