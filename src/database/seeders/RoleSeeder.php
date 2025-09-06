<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's roles.
     */
    public function run(): void
    {
        foreach (['manager', 'operator', 'custom'] as $name) {
            Role::firstOrCreate(['name' => $name]);
        }
    }
}
