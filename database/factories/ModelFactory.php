<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        'cate_id' => App\Category::all()->random()->id,
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'image' => 'none.png',
        'desc' => $faker->text,
        'detail'=>$faker->text,
        'meta_key'=>$faker->text,
        'meta_desc'=>$faker->text,
        'user_id'=>App\User::all()->random()->id,
        'isBrowse'=>1
    ];
});

