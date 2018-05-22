<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // Foreign Key 제약 떄문에 레코드 삭제가 안되는 에러발생을 방지한다.
        $this->call(UsersTableSeeder::class);
        $this->command->info('users table seeded');

        $this->call(PostsTableSeeder::class);
        $this->command->info('posts table seeded');
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); // Foreign Key 제약 떄문에 레코드 삭제가 안되는 에러발생을 방지한다.


        // $this->call(UsersTableSeeder::class);
    }
}
