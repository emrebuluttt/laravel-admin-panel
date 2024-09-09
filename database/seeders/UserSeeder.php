<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        $permissions['blog-yoneticisi'] = [
            [
                'title' => 'Yazıları görüntüleyebilir',
                'description' => 'Tüm yazıları Görüntüleyebilir'
            ],
            [
                'title' => 'Yazıları düzenleyebilir',
                'description' => 'Tüm yazıları düzenleyebilir'
            ],
            [
                'title' => 'Yazı kategorilerini görüntüleyebilir',
                'description' => 'Tüm yazı kategorilerini görüntüleyebilir'
            ],
            [
                'title' => 'Yazı kategorilerini düzenleyebilir',
                'description' => 'Tüm yazı kategorilerini düzenleyebilir'
            ],
        ];

        $permissions['e-ticaret-yoneticisi'] = [
            [
                'title' => 'Siparişleri görüntüleyebilir',
                'description' => 'Tüm siparişleri Görüntüleyebilir'
            ],
            [
                'title' => 'Siparişleri düzenleyebilir',
                'description' => 'Tüm siparişleri düzenleyebilir'
            ],
            [
                'title' => 'Ürünleri görüntüleyebilir',
                'description' => 'Ürün kategorilerini görüntüleyebilir'
            ],
            [
                'title' => 'Ürünleri düzenleyebilir',
                'description' => 'Ürün kategorilerini düzenleyebilir'
            ],
        ];

        foreach ($permissions as $key => $permission) {
            $role = Role::where('name', $key )->first();


            foreach ($permission as $item){
               $newPermission = Permission::updateOrCreate(
                    [
                        'name' => Str::slug($item['title']),
                    ],
                    [
                        'name' => Str::slug($item['title']),
                        'title' => $item['title'],
                        'description' => $item['description'],
                    ]
               );


               $role->givePermissionTo($newPermission);
            }

        }


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
