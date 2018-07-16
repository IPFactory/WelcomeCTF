<?php

use Faker\Generator as Faker;

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

$factory->define(App\Model\User::class, function (Faker $faker) {
    $name = $faker->userName;
    return [
        'name'      =>  $name,
        'email'     =>  $faker->unique()->safeEmail,
        'password'  =>  bcrypt($name),
        'icon'      =>  '/icon/fast_icon.png',
        'icon_small'=>  '/icon/fast_icon_small.png',
    ];
});
