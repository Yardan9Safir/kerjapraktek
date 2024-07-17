<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Santri;

class SantrisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $santris = [
            [
                'nomor_induk' => '13012963',
                'nama' => 'Supriadi Prima',
                'nama_wali' => 'Budi',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-05-15',
                'alamat' => 'Jl. Raya No. 123',
                'tahun_masuk' => 2015,
            ],
            [
                'nomor_induk' => '13012964',
                'nama' => 'Sisiuuuu',
                'nama_wali' => 'Cindy',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2001-08-20',
                'alamat' => 'Jl. Mawar No. 456',
                'tahun_masuk' => 2016,
            ],
        ];

        // Insert data into the database
        foreach ($santris as $santri) {
            Santri::create($santri);
        }
    }
}
