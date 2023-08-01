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
                'panjang_perbaikan' => '10',
                'lebar_perbaikan' => '2',
                'nama_lokasi' => 'Jalan Raya',
                'nama_company' => 'PT. LKKS',
                'longitude' => '-6.1751',
                'latitude' => '106.8272',
                'foto' => 'foto.jpeg',
                'tgl_start' => '2021-07-04 08:01:07',
                'tgl_end' => '2021-07-04 08:01:07',
                'status' => '1'
            ],
            [
                'unique_id' => '1',
                'panjang_perbaikan' => '5',
                'lebar_perbaikan' => '1',
                'nama_lokasi' => 'Jalan Raya',
                'nama_company' => 'PT. LPAI',
                'longitude' => '-8.3405',
                'latitude' => '115.1628',
                'foto' => 'foto.jpeg',
                'tgl_start' => '2021-07-04 08:01:07',
                'tgl_end' => '2021-07-04 08:01:07',
                'status' => '2'
            ],
            [
                'unique_id' => '1',
                'panjang_perbaikan' => '15',
                'lebar_perbaikan' => '3',
                'nama_lokasi' => 'Jalan Raya',
                'nama_company' => 'PT. PTRA',
                'longitude' => '-6.962141595962189',
                'latitude' => '107.6643171912623',
                'foto' => 'foto.jpeg',
                'tgl_start' => '2021-07-04 08:01:07',
                'tgl_end' => '2021-07-04 08:01:07',
                'status' => '3'
            ],
            [
                'unique_id' => '1',
                'panjang_perbaikan' => '20',
                'lebar_perbaikan' => '4',
                'nama_lokasi' => 'Jalan Raya',
                'nama_company' => 'PT. KREA',
                'longitude' => '-6.937085780664934',
                'latitude' => '107.60319073076269',
                'foto' => 'foto.jpeg',
                'tgl_start' => '2021-07-04 08:01:07',
                'tgl_end' => '2021-07-04 08:01:07',
                'status' => '2'
            ]
        ];
        Pelaporan::query()->insert($pelaporan);
    }
}
