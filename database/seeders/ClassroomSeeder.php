<?php

use Illuminate\Database\Seeder;

class classrooms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Models\classrooms::class,10)->create();
    }
}