<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Raji',
                'kelas' => 'XII RPL 1',
                'role_status' => 'siswa',
                'email' => 'raji@gmail.com',
                'password' => Hash::make('raji1234'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        foreach ($data as $val) {
            Siswa::insert([
                'name' => $val['name'],
                'kelas' => $val['kelas'],
                'role_status' => $val['role_status'],
                'email' => $val['email'],
                'password' => $val['password'],
                'created_at' => $val['created_at'],
                'updated_at' => $val['updated_at']
            ]);
        }
    }
}
