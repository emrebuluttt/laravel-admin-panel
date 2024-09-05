<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::updateOrCreate(
            [
                'name' => 'yonetici',
            ],
            [
                'name' => 'yonetici',
                'title' => 'Yönetici',
                'description' => 'Sitenin Genel Yönetimini sağlar.',
            ]);

        $roleBlog = Role::updateOrCreate(
            [
                'name' => 'blog-yoneticisi',
            ],
            [
                'name' => 'blog-yoneticisi',
                'title' => 'Blog Yöneticisi',
                'description' => 'Blog yönetimini sağlar.',
            ]);

        $roleECommerce = Role::updateOrCreate(
            [
                'name' => 'e-ticaret-yoneticisi',
            ],
            [
                'name' => 'e-ticaret-yoneticisi',
                'title' => 'E-Ticaret Yöneticisi',
                'description' => 'E-Ticaret yönetimini sağlar.',
            ]);

        $user = User::updateOrCreate(
            [
                'email' => 'emre@mail.com',
            ],
            [
            'name' => 'Emre',
            'email' => 'emre@mail.com',
            'password' => bcrypt('emre123'),
        ]);



        $user->assignRole($role);


        if (User::count() == 1)
            $users =  User::factory(100)->create();
            foreach($users as $user) {
                $user->assignRole(rand(0, 1) == 1 ? $roleBlog : $roleECommerce);
            }

    }


}
