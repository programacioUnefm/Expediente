<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $paises = [
        ['pais'=> 'Venezuela'],
      ];
      DB::table('paises')->insert($paises);  
    }
}
