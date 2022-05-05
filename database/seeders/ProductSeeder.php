<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            "stock" => 50,
            "name" => "Minyak Curah",
            "price"=> 40000,
            "description" => "Minyak hasil penimbunan",
            "sold" => 0
        ]);
        DB::table('product')->insert([
            "stock"=> 100  ,
            "name"=> "Mie Sedap",
            "price"=> 15000,
            "description"=> "Mie paling sedaaappp!!",
            "sold" => 0
        ]);
        DB::table('product')->insert([
            "stock"=> 30,
            "name"=> "Mentega",
            "price"=> 5000,
            "description"=> "Sangat enak untuk pelengkap masakan",
            "sold" => 0
        ]);
    }
}
