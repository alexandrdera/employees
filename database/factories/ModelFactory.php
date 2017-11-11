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
/**
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

*/
$factory->define(App\Employee::class, function (Faker\Generator $faker) {
   
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'patronomic' => $faker->firstName,
        'position_id' => 7,	//random_int(1, 7),
		'employmend_date' => date('Y-m-d'),
        'salary' => random_int(5000, 10000)
    ];
});

$factory->state(App\Employee::class, 'worker', function ($faker) { 
 	return [ 'position_id' => 7, 'salary' => random_int(10000, 40000), ]; 
}); 

$factory->state(App\Employee::class, 'head_of_the_sector', function ($faker) { 
 	return [ 'position_id' => 6, 'salary' => random_int(40000, 50000), ]; 
}); 

$factory->state(App\Employee::class, 'deputy_chief', function ($faker) { 
 	return [ 'position_id' => 5, 'salary' => random_int(50000, 60000), ]; 
}); 

$factory->state(App\Employee::class, 'chief', function ($faker) { 
 	return [ 'position_id' => 4, 'salary' => random_int(60000, 80000), ]; 
}); 

$factory->state(App\Employee::class, 'vice_president', function ($faker) { 
 	return [ 'position_id' => 3, 'salary' => random_int(80000, 200000), ]; 
}); 

$factory->state(App\Employee::class, 'director', function ($faker) { 
 	return [ 'position_id' => 2, 'salary' => random_int(200000, 300000), ]; 
}); 

$factory->state(App\Employee::class, 'CEO', function ($faker) { 
 	return [ 'position_id' => 1, 'salary' => 1000000, ]; 
}); 
