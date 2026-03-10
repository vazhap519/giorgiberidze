<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // პირველი Super Admin
        $user1 = User::firstOrCreate(
            ['email' => 'sanny090293@gmail.com'],
            [
                'name' => 'Sandro',
                'password' =>  Hash::make('Tvt123456@'),
                'is_admin' => true,
            ]
        );



        // მეორე Super Admin
        $user2 = User::firstOrCreate(
            ['email' => 'safetechcomge@gmail.com'],
            [
                'name' => 'SafeTech',
                'password' =>  Hash::make('SafeTech123!'),
                'is_admin' => true,
            ]
        );


    }
}
