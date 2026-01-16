<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissoes = [
            'ver_dashboard',
            'gerenciar_produtos',
            'movimentar_estoque',
            'gerenciar_usuarios',
        ];

        foreach ($permissoes as $nome) {
            Permissao::firstOrCreate(['nome' => $nome]);
        }
    }
}
