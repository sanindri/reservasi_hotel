<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nama'     => 'Administrator',
            'username'    => 'admin',
            'role'    => 'admin',
            'password' => bcrypt('1234'),
        ]);
    
        Admin::create([
            'nama'     => 'Resepsionis',
            'username'    => 'adinda',
            'role'    => 'resepsionis',
            'password' => bcrypt('1234'),
        ]);
    
        Admin::create([
            'nama'     => 'lintung',
            'username'    => 'linn',
            'role'    => 'Resepsionis',
            'password' => bcrypt('1234'),
        ]);
    }
}
