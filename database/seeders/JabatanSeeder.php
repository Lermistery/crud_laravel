<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $jabatans = [
            ['id_jabatan' => 1, 'nama_jabatan' => 'Administrator'],
            ['id_jabatan' => 2, 'nama_jabatan' => 'Member'],
            ['id_jabatan' => 3, 'nama_jabatan' => 'Viewer'],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('jabatan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('jabatan')->insert($jabatans);
    }
}
