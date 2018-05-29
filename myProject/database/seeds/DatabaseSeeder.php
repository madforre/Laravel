<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Prepare seeding
         * 외래키 체크를 풀어줌
         */
        $faker = Faker\Factory::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Model::unguard();

        /*
         * Seeder 호출, 데이터 심기(Data Seeding)
         */ 
        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            ArticlesTableSeeder::class,
            CommentsTableSeeder::class,
            TagsTableSeeder::class,
            AttachmentsTableSeeder::class,
        ]);

        /**
         * Close seeding
         * 외래키 체크 초기화
         */
        Model::reguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
