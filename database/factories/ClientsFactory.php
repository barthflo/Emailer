<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class),
        'company'=>$faker->sentence($nbWord=2),
        'position'=>$faker->sentence($nbWord=1),
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail
    ];
});
