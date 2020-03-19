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

        $super_admin = User::create([
        	'name' => 'SuperAdmin',
        	'email' => 'super@admin.com',
        	'password' => Hash::make('password'),
            'church' => 'Super Admin'
        ]);

        // $cathedral_admin = User::create([
        // 	'name' => 'Cathedral Admin',
        // 	'email' => 'cathedral@admin.com',
        // 	'password' => Hash::make('password'),
        //     'church' => 'St.Michael The Archangel Parish'
        // ]);

        // $admin = User::create([
        //     'name' => 'San Lorenzo Ruiz Admin',
        //     'email' => 'san_lorenzo_ruiz@admin.com',
        //     'password' => Hash::make('password'),
        //     'church' => 'San Lorenzo Ruiz Parish'
        // ]);

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
