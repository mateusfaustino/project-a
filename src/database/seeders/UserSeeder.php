<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's users.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Manager',
                'email' => 'manager@example.com',
                'role' => 'manager',
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@example.com',
                'role' => 'operator',
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@example.com',
                'role' => 'customer',
            ],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => 'password',
                ]
            );

            $role = Role::where('name', $data['role'])->first();
            if ($role) {
                $user->roles()->syncWithoutDetaching([$role->id]);
            }
        }
    }
}

