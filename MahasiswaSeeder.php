<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];

        for($i = 0; $i<5; $i++)
            {
                $data[]=[
                    'npm' => 'M00' . $i,
                    'nidn' =>DB::table('dosen')->inRandomOrder()->value('nidn'), //ini untuk relasi 
                    'nama' => $faker->name()
                ];
            }

        DB::table('mahasiswa')->insert($data);
    }
}
