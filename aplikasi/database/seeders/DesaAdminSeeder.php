<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('desa')->insert([
            [
                'nama_desa' => 'Admin',
                'alamat_desa' => 'Admin',
                'kode_pos' => '123456',
                'logo_desa' => null,
                'kabupaten' => 'Admin',
                'kecamatan' => 'Admin',
                'kelurahan' => 'Admin',
                'ttd_kades' => null,
                'no_hp' => '082156485632',
                'nama_kades' => 'Admin',
                'nip_kades' => '15324795216',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_desa' => 'Kucing',
                'alamat_desa' => 'Persia',
                'kode_pos' => '458632',
                'logo_desa' => null,
                'kabupaten' => 'Persia',
                'kecamatan' => 'Anggora',
                'kelurahan' => 'Lynx',
                'ttd_kades' => null,
                'no_hp' => '082156425732',
                'nama_kades' => 'Ragdoll',
                'nip_kades' => '15323995216',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
