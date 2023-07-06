<?php

namespace Database\Seeders;

use App\Models\Pelaporan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelaporan = [
            [
                'unique_id' => '1',
                'nama_proyek' => 'Proyek LKKS',
                'nama_lokasi' => 'Jalan Raya',
                'nama_company' => 'PT. LKKS',
                'longitude' => '123.123',
                'latitude' => '123.123',
                'tgl_start' => '2021-07-04 08:01:07',
                'tgl_end' => '2021-07-04 08:01:07',
            ],
            [
                'unique_id' => '1',
                'nama_proyek' => 'Proyek LPAI',
                'nama_lokasi' => 'Jalan Raya',
                'nama_company' => 'PT. LPAI',
                'longitude' => '123.123',
                'latitude' => '123.123',
                'tgl_start' => '2021-07-04 08:01:07',
                'tgl_end' => '2021-07-04 08:01:07',
            ],
        ];
        Pelaporan::query()->insert($pelaporan);
    }
}
