<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $faker = Faker::create('id_ID');
     $data = [];
     for($i=0; $i<5; $i++)
        {
            $data[] = [
                'kode_matakuliah' =>'MK00' . $i,
                'nama_matakuliah' => $faker->word,
                'sks' => rand(2,4),
                'created_at' => now(),
                'updated_at' => now()
                ];
        }   
        DB::table('matakuliah')->insert($data);
    }
}
