<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapels = [
            [
                'nama' => 'Banjari',
                'keterangan' => 'Ekstrakurikuler Banjari mengembangkan seni musik Islam tradisional Banjari dari Kalimantan Selatan, memperkenalkan, mempelajari, dan melestarikan warisan budaya Indonesia.',
                'ekstrakulikuler' => true,
            ],

            [
                'nama' => 'Nasyid',
                'keterangan' => 'Dalam kegiatan Nasyid, siswa diajarkan berbagai teknik vokal dan instrumental, seperti melodi, harmoni, dan ritme. Mereka juga belajar berbagai pola koreografi yang sesuai dengan tema dan isi lagu-lagu religius. ',
                'ekstrakulikuler' => false,
            ],
        ];

        // Insert data into the database
        foreach ($mapels as $mapel) {
            Mapel::create($mapel);
        }

        //Testing 2,5k data gakuat cik wkwkwk
        // for ($i = 1; $i <= 2500; $i++) {
        //     Mapel::create([
        //         'nama' => 'Mapel ' . $i,
        //         'keterangan' => 'Keterangan Mapel ' . $i,
        //         'ekstrakulikuler' => $i % 2 == 0 ? true : false, // Contoh pengaturan ekstrakulikuler (genap true, ganjil false)
        //     ]);
        // }

        //Testing 500 data kuat boy
        // for ($i = 1; $i <= 500; $i++) {
        //     Mapel::create([
        //         'nama' => 'Mapel ' . $i,
        //         'keterangan' => 'Keterangan Mapel ' . $i,
        //         'ekstrakulikuler' => $i % 2 == 0 ? true : false, // Contoh pengaturan ekstrakulikuler (genap true, ganjil false)
        //     ]);
        // }
    }
}
