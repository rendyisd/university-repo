<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Test Admin',
                'email' => 'testadmin@test.com',
                'password' => Hash::make('test12345'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Test User',
                'email' => 'testuser@test.com',
                'password' => Hash::make('test12345'),
                'role' => 'User',
            ],
            [
                'name' => 'John User',
                'email' => 'johnuser@test.com',
                'password' => Hash::make('test12345'),
                'role' => 'User',
            ],
        ];

        foreach ($data as $row) {
            $user = new User($row);
            $user->save();
        }
    }
}
