<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BaseAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'hc',
            'email' => 'hc@gmail.com',
            'password' => Hash::make('hc4webcs'),
            'role' => 'admin',
        ]);
    }
}
