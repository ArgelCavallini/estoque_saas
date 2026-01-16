<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_movimentacao')->insert([
            ['nome' => 'Entrada', 'fator' => 1],
            ['nome' => 'Saída', 'fator' => -1],
        ]);
    }
}
