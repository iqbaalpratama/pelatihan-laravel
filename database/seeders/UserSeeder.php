<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Cristiano',
            'email' => 'cristiano@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        DB::table('users')->insert([
            'name' => 'Iqbaal',
            'email' => 'iqbaalinosoft@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
