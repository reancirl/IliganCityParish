<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $adminRole = Role::where('name', 'admin')->first();
        // $authorRole = Role::where('name', 'author')->first();
        // $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'SuperAdmin',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('secret')
        ]);

        $user = User::create([
        	'name' => 'Reancirl',
        	'email' => 'reancirl@gmail.com',
        	'password' => Hash::make('secret')
        ]);

        // $author = User::create([
        // 	'name' => 'author',
        // 	'email' => 'author@author.com',
        // 	'password' => Hash::make('secret')
        // ]);

        // $admin->roles()->attach($adminRole);
        // $author->roles()->attach($authorRole);
        // $user->roles()->attach($userRole);
    }
}
