<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::first();
        $adminRole = Role::first();
        $user = User::find(2);
        $userRole = Role::find(2);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
