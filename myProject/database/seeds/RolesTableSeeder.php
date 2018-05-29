<?php

use Illuminate\Database\Seeder;
use App\Role;

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
        $role_employee = new Role();
        $role_employee->name = 'employee';
        $role_employee->description = 'A Employee User';
        $role_employee->save();
        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'A Manager User';
        $role_manager->save();

        // App\User::where('email', '!=', 'john@example.com')->get()->map(function($user) use($memberRole) {
        //     $user->roles()->attach(array $memberRole);
        // });

        // App\User::whereEmail('john@example.com')->get()->map(function($user) use($adminRole){
        //     $user->roles()->attach(array $adminRole);
        // });
        $this->command->info('roles table seeded');
    }
}
