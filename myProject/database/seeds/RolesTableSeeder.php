<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Collection;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /**
         * Seeding roles table
         */
        $role_visitor = new Role();
        $role_visitor->name = 'visitor';
        $role_visitor->description = 'A Visitor User';
        $role_visitor->save();

        $role_admin = new Role();
        $role_admin->name = 'author';
        $role_admin->description = 'An Author User';
        $role_admin->level = 1;
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An Admin User';
        $role_admin->level = 2;
        $role_admin->save();

        // Eloquent ORM Collection Method

        // get()
        // The get method returns the item at a given key. 
        // If the key does not exist, null is returned:

        // map() method
        // The map method iterates through the collection 
        // and passes each value to the given callback. 
        // The callback is free to modify the item and return it, 
        // thus forming a new collection of modified items:
        // map 메소드는 컬렉션 전체를 반복하여 주어진 콜백에 각각의 값을 전달합니다.
        // 콜백은 자유롭게 아이템을 변경하고 반환하여, 변경된 아이템으로 구성된 
        // 새로운 컬렉션이 만들어 집니다.

        $user = App\User::where('email', '!=', 'hou@gmail.com')->get()->map(function($user) use($role_visitor) {
            $user->roles()->attach($role_visitor);
        });

        App\User::whereEmail('hou@gmail.com')->get()->map(function($user) use($role_admin){
            $user->roles()->attach($role_admin);
        });

        $this->command->info('roles table seeded');
    }
}
