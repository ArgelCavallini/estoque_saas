<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Permissao;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'nome' => 'Dashboard',
                'rota' => 'dashboard',
                'icone' => '📊',
                'ordem' => 1,
                'permissao' => 'ver_dashboard',
            ],
            [
                'nome' => 'Produtos',
                'rota' => 'produtos.index',
                'icone' => '📦',
                'ordem' => 2,
                'permissao' => 'gerenciar_produtos',
            ],
            [
                'nome' => 'Estoque',
                'rota' => 'estoque.index',
                'icone' => '🔄',
                'ordem' => 3,
                'permissao' => 'movimentar_estoque',
            ],
        ];

        foreach ($menus as $menu) {
            $permissao = Permissao::where('nome', $menu['permissao'])->first();

            Menu::firstOrCreate(
                ['nome' => $menu['nome']],
                [
                    'rota' => $menu['rota'],
                    'icone' => $menu['icone'],
                    'ordem' => $menu['ordem'],
                    'permissao_id' => $permissao?->id,
                    'ativo' => true,
                ]
            );
        }
    }
}
