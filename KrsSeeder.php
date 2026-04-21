<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class KrsSeeder extends Seeder
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
            $data[] = [
            'npm' =>DB::table('mahasiswa')->inRandomOrder()->value('npm'),
            'kode_matakuliah' =>DB::table('matakuliah')->inRandomOrder()->value('kode_matakuliah'),
            'created_at' => now(),
            'updated_at' => now()
            ];
         }
         DB::table('krs')->insert($data);
    }
}
