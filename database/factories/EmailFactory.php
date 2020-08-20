<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Email;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class),
        'name'=>$faker->unique()->title,
        'location_path'=>'emails.template1',
        'content'=>$faker->paragraphs(5)
    ];
});
