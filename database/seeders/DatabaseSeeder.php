<?php

namespace Database\Seeders;

use App\Models\Proposal;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'approver',
        ]);
        Role::create([
            'name' => 'staff',
        ]);

        User::create([
            'role_id' => '3',
            'nama_depan' => 'Muhammad Naufal',
            'nama_belakang' => 'Jatiageng',
            'email' => 'mnja123',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_id' => '3',
            'nama_depan' => 'Hantoko',
            'email' => 'hantoko',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_id' => '3',
            'nama_depan' => 'Administrator',
            'email' => 'admin123',
            'password' => bcrypt('administrator'),
        ]);
        
        Proposal::create([
            'user_id' => 1,
            'deskripsi' => 'Percobaan pertama dulu gaes',
            'divisi' => 'produksi',
            'file_permohonan_adp' => 'filePermohonan.pdf',
            'file_estimasi_adp' => 'fileEstimasi.pdf',
            'no_adp' => 'ADP-2021-00011',
            'no_capex' => '	T/PRJ/2021/00011'
        ]);
        Proposal::create([
            'user_id' => 1,
            'deskripsi' => 'Percobaan Kedua dulu gaes',
            'divisi' => 'proses',
            'file_permohonan_adp' => 'filePermohonan.pdf',
            'file_estimasi_adp' => 'fileEstimasi.pdf',
            'no_adp' => 'ADP-2021-00011',
            'no_capex' => '	T/PRJ/2021/00011'
        ]);
    }
}
