<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Seeding articles table
         */
        $faker = Faker\Factory::create(); // 
        $articles = App\Article::all(); // 변수에러 방지
        App\Article::truncate();
        $users = App\User::all();

        $users->each(function($user) use($faker) {
            $user->articles()->save(
                factory(App\Article::class)->make()
            );
        });
        $this->command->info('articles table seeded');        
    }
}
