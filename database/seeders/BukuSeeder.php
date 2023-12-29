<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Belajar Laravel',
                'penerbit' => 'SMKS Taruna Bhakti',
                'pengarang' => 'Bu Miranda',
                'stok_buku' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ]];

        foreach ($data as $val) {
            Buku::insert([
                'judul' => $val['judul'],
                'penerbit' => $val['penerbit'],
                'pengarang' => $val['pengarang'],
                'stok_buku' => $val['stok_buku'],
                'created_at' => $val['created_at'],
                'updated_at' => $val['updated_at']
            ]);
        }
    }
}
