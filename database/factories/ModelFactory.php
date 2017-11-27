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
//Определение базовой фабрики
$factory->define(App\Employee::class, function (Faker\Generator $faker) {
   
    return [
        'parent_id' => random_int(1, pow(6,0) + pow(6,1) + pow(6,2) + pow(6,3) + pow(6,4) + pow(6,5) + pow(6,6)),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'patronomic' => $faker->firstName,
        'position' => $faker->jobTitle,
		'employment_date' => date('Y-m-d'),
        'salary' => random_int(5000, 10000),
        'photo' => 'upload/photo/template.jpg',
        'thumb' => 'upload/thumb/template.jpg'

    ];
});

//Определение фабрик и состояний для каждой должности
$factory->state(App\Employee::class, 'CEO', function ($faker) { 
 	return [ 
            'parent_id' => NULL, 
            'position' => 'CEO', 
            'salary' => 1000000, ]; 
}); 

$factory->state(App\Employee::class, 'director', function ($faker) { 
    return [ 
            'parent_id' => 1, 
            'position' => 'Director', 
            'salary' => random_int(200000, 300000), ]; 
}); 

$factory->state(App\Employee::class, 'vice_president', function ($faker) { 
    return [ 
            'parent_id' => random_int(2, 1+pow(6,1)), 
            'position' => 'Vice president', 
            'salary' => random_int(80000, 200000), ]; 
}); 

$factory->state(App\Employee::class, 'chief', function ($faker) { 
    return [ 
            'parent_id' => random_int(pow(6,1)+2, 1+pow(6,2)), 
            'position' => 'Chief', 
            'salary' => random_int(60000, 80000), ]; 
}); 

$factory->state(App\Employee::class, 'deputy_chief', function ($faker) { 
    return [ 
            'parent_id' => random_int(pow(6,2)+2, 1+pow(6,3)), 
            'position' => 'Deputy chief', 
            'salary' => random_int(50000, 60000), ]; 
}); 

$factory->state(App\Employee::class, 'head_of_the_sector', function ($faker) { 
    return [ 
            'parent_id' => random_int(pow(6,3)+2, 1+pow(6,4)), 
            'position' => 'Head of the sector', 
            'salary' => random_int(40000, 50000), ]; 
}); 

$factory->state(App\Employee::class, 'worker', function ($faker) { 
    return [ 
            'parent_id' => random_int(pow(6,4)+2, 1+pow(6,5)), 
            'position' => 'Worker', 
            'salary' => random_int(10000, 40000), ]; 
}); 