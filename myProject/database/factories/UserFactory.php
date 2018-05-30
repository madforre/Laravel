<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)), // secret
        'remember_token' => str_random(10),
        'status' => 1
    ];

});

// 모델 팩토리 추가 작성
    
$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence(),
        'content' => $faker->paragraph(),
    ];
});
    
$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence,
        'content' => $faker->paragraph,
    ];
});
    
$factory->define(App\Tag::class, function (Faker $faker) {
    $name = ucfirst($faker->optional(0.9, 'Laravel')->word);
                            // 10% chance of NULL
    return [
            'name' => $name,
            'slug' => str_slug($name),
        ];
});

// 사용자가 업로드한 파일의 이름(또는 경로)을 담고 있는 모델이다.
$factory->define(App\Attachment::class, function (Faker $faker) {
    return [
        'name' => sprintf("%s.%s", str_random(), $faker->randomElement(['png', 'jpg'])),
    ];
});
