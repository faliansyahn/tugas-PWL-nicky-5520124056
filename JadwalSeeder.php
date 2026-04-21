<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create('id_ID');
        $data = [];
         $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        for($i = 0; $i<5; $i++)
            {
                $data[]=[
                'kode_matakuliah'=> DB::table('matakuliah')->inRandomOrder()->value('kode_matakuliah'),
                'nidn'=> DB::table('dosen')->inRandomOrder()->value('nidn'),
                'kelas'=>rand(0,2),
                'hari' => $hari[array_rand($hari)],
                'jam' => rand(8, 15) . ':00:00',
                'created_at' => now(),
                'updated_at' => now()
                ];
            }
        DB::table('jadwal')->insert($data);
    }
}
