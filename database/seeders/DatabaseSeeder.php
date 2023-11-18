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
            'role_name' => 'ofc',
            'role_id' => 2,
            'nama_depan' => 'OFC',
            'username' => 'ofc123',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_name' => 'gl',
            'role_id' => 2,
            'nama_depan' => 'gl',
            'username' => 'gl123',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_name' => 'manager',
            'role_id' => 2,
            'nama_depan' => 'manager',
            'username' => 'manager123',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_name' => 'fm',
            'role_id' => 2,
            'nama_depan' => 'fm',
            'username' => 'fm123',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_name' => 'acc',
            'role_id' => 2,
            'nama_depan' => 'acc',
            'username' => 'acc123',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_name' => 'staff',
            'role_id' => 3,
            'nama_depan' => 'Hantoko',
            'username' => 'hantoko',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'role_name' => 'admin',
            'role_id' => 1,
            'nama_depan' => 'Administrator',
            'username' => 'admin123',
            'password' => bcrypt('administrator'),
        ]);
        
    }
}
