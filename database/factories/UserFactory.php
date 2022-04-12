<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'mail_address' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
         'name' => $faker->name,
        'address' => 'Hà Nội',
        'phone' => '0969686300',
        'role'=>'2',
        'classroom_id'=> $faker->numberBetween(1,10)
        
    ];
});