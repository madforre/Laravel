<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DB 파사드 사용

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Seeding tags table
         */
        $faker = Faker\Factory::create();// 변수에러 방지
        $articles = App\Article::all(); // 변수에러 방지

        // 피봇모델을 정의하지 않았으므로 
        // DB Facade 이용하여 trancate()해준다.
        App\Tag::truncate();
        DB::table('article_tag')->truncate();
        $articles->each(function($article) use($faker) {
            $article->tags()->save(
                factory(App\Tag::class)->make()
            );
        });
        $this->command->info('tags table seeded');
    }
}
