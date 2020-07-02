<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\Role;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'role_id'=>$faker->numberBetween(1,4),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'category_id' => $faker->numberBetween(1,4),
        'photo_id' =>null,
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraph(rand(10,15),true),
        'slug'=>$faker->slug(),
        'created_at'=>now(),
        'updated_at'=>now() 
    ];
});

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['administrator','subscriber','author']),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP','Laravel','JS','Bootstrap','Vue','Paython']),
    ];
});
