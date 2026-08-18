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
            ['id_jabatan' => 1, 'nama_jabatan' => 'Project Manager'],
            ['id_jabatan' => 2, 'nama_jabatan' => 'Product Owner'],
            ['id_jabatan' => 3, 'nama_jabatan' => 'Scrum Master'],
            ['id_jabatan' => 4, 'nama_jabatan' => 'Frontend Developer'],
            ['id_jabatan' => 5, 'nama_jabatan' => 'Backend Developer'],
            ['id_jabatan' => 6, 'nama_jabatan' => 'UI/UX Designer'],
            ['id_jabatan' => 7, 'nama_jabatan' => 'Quality Assurance'],
        ];
        DB::table('jabatan')->insert($jabatans);
    }
}