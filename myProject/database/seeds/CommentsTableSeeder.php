<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Seeding comments table
         */
        $faker = Faker\Factory::create();
        $users = App\User::all();
        App\Comment::truncate();

        $articles = App\Article::all();
        // each 메소드는 컬렉션의 아이템을 반복적으로 처리하여 콜백에 각
        // 아이템을 전달합니다.
        $articles->each(function($article) use($faker, $users) {
            $article->comments()->save(
                factory(App\Comment::class)->make([
                    'author_id' => $faker->randomElement($users->pluck('id')->toArray())
                ]) 
            );
        });
        $this->command->info('comments table seeded');
    }
}
