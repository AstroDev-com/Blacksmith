<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // إنشاء المستخدمين
        $users = [
            [
                'name' => 'المدير العام',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'super-admin'
            ],
            [
                'name' => 'المدير',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'المستخدم',
                'email' => 'user@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'user'
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password']
            ]);

            $user->assignRole($userData['role']);
        }
    }
}
