<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $User   = [
            [
                'nama' => 'Rakan Bagja',
                'username' => 'RakanPL0',
                'pass' => Hash::make('SellIndo26'),
                'id_jabatan' => 1
            ],
        ];
        DB::table('users')->insert($User);
    }
}