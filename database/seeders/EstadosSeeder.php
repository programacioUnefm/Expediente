<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $estados = [
          ['estado' => 'Anzoátegui', 'pais_id' => 1, 'region' => 'Nororiental'],
          ['estado' => 'Amazonas', 'pais_id' => 1, 'region' => 'Guayana'],
          ['estado' => 'Apure', 'pais_id' => 1, 'region' => 'Los Llanos'],
          ['estado' => 'Aragua', 'pais_id' => 1, 'region' => 'Central'],
          ['estado' => 'Barinas', 'pais_id' => 1, 'region' => 'Los Andes'],
          ['estado' => 'Bolívar', 'pais_id' => 1, 'region' => 'Guayana'],
          ['estado' => 'Carabobo', 'pais_id' => 1, 'region' => 'Central'],
          ['estado' => 'Cojedes', 'pais_id' => 1, 'region' => 'Central'],
          ['estado' => 'Delta Amacuro', 'pais_id' => 1, 'region' => 'Guayana'],
          ['estado' => 'Falcón', 'pais_id' => 1, 'region' => 'Centroccidental'],
          ['estado' => 'Guárico', 'pais_id' => 1, 'region' => 'Los Llanos'],
          ['estado' => 'Lara', 'pais_id' => 1, 'region' => 'Centroccidental'],
          ['estado' => 'Mérida', 'pais_id' => 1, 'region' => 'Los Andes'],
          ['estado' => 'Miranda', 'pais_id' => 1, 'region' => 'Capital'],
          ['estado' => 'Monagas', 'pais_id' => 1, 'region' => 'Nororiental'],
          ['estado' => 'Nueva Esparta', 'pais_id' => 1, 'region' => 'Insular'],
          ['estado' => 'Portuguesa', 'pais_id' => 1, 'region' => 'Centroccidental'],
          ['estado' => 'Sucre', 'pais_id' => 1, 'region' => 'Nororiental'],
          ['estado' => 'Táchira', 'pais_id' => 1, 'region' => 'Los Andes'],
          ['estado' => 'Trujillo', 'pais_id' => 1, 'region' => 'Los Andes'],
          ['estado' => 'Vargas', 'pais_id' => 1, 'region' => 'Capital'],
          ['estado' => 'Yaracuy', 'pais_id' => 1, 'region' => 'Centroccidental'],
          ['estado' => 'Zulia', 'pais_id' => 1, 'region' => 'Zuliana'],
          ['estado' => 'Distrito Capital', 'pais_id' => 1, 'region' => 'Capital'],
        ];

        DB::table('estados')->insert($estados);
    }
}
