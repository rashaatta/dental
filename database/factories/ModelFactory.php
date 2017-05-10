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


use App\User;
use App\Staff;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Staff::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'mobile' => $faker->phoneNumber,
        'telephone' => $faker->phoneNumber,
        'specialty_id' => $faker->numberBetween(1, 10),
        'salary' => $faker->randomFloat(2, 10, 1000000),
        'percent' => $faker->randomFloat(2, 1, 100),
        'session_duration' => $faker->numberBetween(1, 12),
        'address' => $faker->address,
        'entry_time' => $faker->dateTime,
        'exit_time' => $faker->dateTime,
        'user_id' => 1];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\WorkDays::class, function (Faker\Generator $faker) {

    return [
        'key_name' => $faker->dayOfWeek,
        'en_value' => $faker->dayOfWeek,
        'ar_value' => $faker->dayOfWeek
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\StaffWorkDays::class, function (Faker\Generator $faker) {

    return [
        'staff_id' => $faker->numberBetween(1,50),
        'work_day_id' => $faker->numberBetween(1,7)
    ];
});
