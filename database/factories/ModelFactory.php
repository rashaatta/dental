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

    do {
        $key_name = $faker->dayOfWeek;
    } while (App\WorkDays::where("key_name", "=", $key_name)->first() instanceof App\WorkDays);

    return [
        'key_name' => $key_name,
        'en_value' => $key_name,
        'ar_value' => $key_name
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Specialty::class, function (Faker\Generator $faker) {

    return [
        'key_name' => $faker->jobTitle,
        'en_value' => $faker->jobTitle,
        'ar_value' => $faker->jobTitle
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\StaffWorkDays::class, function (Faker\Generator $faker) {

    do {
        $staff_id = $faker->numberBetween(1, 50);
        $work_days_id = $faker->numberBetween(1, 7);
    } while (App\StaffWorkDays::where("staff_id", "=", $staff_id)->where("work_days_id", "=", $work_days_id)->first() instanceof App\StaffWorkDays);

    return [
        'staff_id' => $staff_id,
        'work_days_id' => $work_days_id
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Corporation::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'mobile' => $faker->phoneNumber,
        'telephone' => $faker->phoneNumber,
        'address' => $faker->address,
        'max_amount' => $faker->numberBetween(0,2000),
        'percent'=> $faker->numberBetween(0,100)
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Patient::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->name,
        'mobile' => $faker->phoneNumber,
        'telephone' => $faker->phoneNumber,
        'address' => $faker->address,
        'corporation_id' => $faker->numberBetween(1, 20),
        'birthday' => $faker->dateTime,
        'job' => $faker->jobTitle
    ];
});
