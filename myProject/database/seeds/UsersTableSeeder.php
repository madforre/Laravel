<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::truncate();
        factory(App\User::class)->create([
            'name' => 'hou',
            'email' => 'hou@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1            
        ]);
        factory(App\User::class, 9)->create();
        $this->command->info('users table seeded');
    }
}
