<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmailTemplate;
use Faker\Generator as Faker;

$factory->define(EmailTemplate::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class),
        'name'=>$faker->unique()->text(10),
        'account'=>$faker->name,
        'content'=>$faker->paragraphs(5)
    ];
});
