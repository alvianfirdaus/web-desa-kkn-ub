<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin user
            [
                'id_desa' => 1,
                'nama_lengkap' => 'User Admin',
                'nik' => '1111111111111111',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jl Admin, No. 1',
                'agama' => 'islam',
                'status_perkawinan' => 'belum_menikah',
                'email' => 'aldyto7350@gmail.com',
                'password' => Hash::make('1111111111111111'),
                'level' => 'admin',
                'foto' => null,
                'no_hp' => '081234567890',
                'id_ktp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Petugas
            [
                'id_desa' => 2,
                'nama_lengkap' => 'Aldyto Petugas',
                'nik' => '1111111111111112',
                'tanggal_lahir' => '1995-05-15',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jl Anggora, No. 2',
                'agama' => 'islam',
                'status_perkawinan' => 'belum_menikah',
                'email' => 'petugas@gmail.com',
                'password' => Hash::make('1111111111111112'),
                'level' => 'petugas',
                'foto' => null,
                'no_hp' => '082345678901',
                'id_ktp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Warga
            [
                'id_desa' => 2,
                'nama_lengkap' => 'Aura',
                'nik' => '1111111111111113',
                'tanggal_lahir' => '1985-10-20',
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Jl Anggora, No. 3',
                'agama' => 'islam',
                'status_perkawinan' => 'menikah',
                'email' => 'warga@gmail.com',
                'password' => Hash::make('1111111111111113'),
                'level' => 'warga',
                'foto' => null,
                'no_hp' => '083456789012',
                'id_ktp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
