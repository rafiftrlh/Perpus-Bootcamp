<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Rafi',
                'role_status' => 'admin',
                'email' => 'rafi@gmail.com',
                'password' => Hash::make('rafi1234'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($data as $val) {
            User::insert([
                'name' => $val['name'],
                'role_status' => $val['role_status'],
                'email' => $val['email'],
                'password' => $val['password'],
                'created_at' => $val['created_at'],
                'updated_at' => $val['updated_at']
            ]);
        }
    }
}
