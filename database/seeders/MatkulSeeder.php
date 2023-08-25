<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul')->insert([
            'id_matkul' => '001',
            'nama_matkul' => 'Web Programming 2',
            'jadwal' => 'Kamis 10:30',
            'kelas' => 'A2',
        ]);
    }
}
