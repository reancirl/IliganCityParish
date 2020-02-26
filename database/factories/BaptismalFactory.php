<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Baptismal;
use Faker\Generator as Faker;

$factory->define(Baptismal::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName($gender = 'male'|'female'),
		'middle_name' => $faker->lastName,
		'last_name' => $faker->lastName,
		'gender' => $faker->randomElement(['Male', 'Female']),
		'parents_type_of_marriage' => $faker->randomElement(['Civil', 'Church']),
		'place_of_birth' => $faker->cityPrefix,
		'place_of_baptism' => 'Iligan City',
		'fathers_name' => $faker->name,
		'mothers_maiden_name' => $faker->name,
		'parents_address' => $faker->cityPrefix,
		'contact_number' => $faker->phoneNumber,

		'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'date_of_attending_seminar' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'date_of_baptism' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
