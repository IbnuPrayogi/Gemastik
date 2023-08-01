<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 11,
                'nama_roles' => 'SuperAdmin'
            ],
            [
                'id' => 99,
                'nama_roles' => 'Kontraktor'
            ],
        ];
        Roles::query()->insert($roles);
    }
}