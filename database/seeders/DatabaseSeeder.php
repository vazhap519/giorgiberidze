<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionGeneratorSeeder::class,
        ]);

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'editor']);

        // პირველი Super Admin
        $user1 = User::firstOrCreate(
            ['email' => 'sanny090293@gmail.com'],
            [
                'name' => 'Sandro',
                'password' => 'Tvt123456@',
            ]
        );

        $user1->assignRole($superAdminRole);

        // მეორე Super Admin
        $user2 = User::firstOrCreate(
            ['email' => 'safetechcomge@gmail.com'],
            [
                'name' => 'SafeTech',
                'password' => 'SafeTech123!',
            ]
        );

        $user2->assignRole($superAdminRole);
    }
}
