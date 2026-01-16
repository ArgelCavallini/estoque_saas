<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permissao;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Global
        Role::firstOrCreate(
            ['nome' => 'Admin Global'],
            ['is_admin_global' => true]
        );

        // Operador
        $operador = Role::firstOrCreate(
            ['nome' => 'Operador'],
            ['is_admin_global' => false]
        );

        // Permissões do operador
        $permissoes = Permissao::whereIn('nome', [
            'ver_dashboard',
            'movimentar_estoque',
        ])->pluck('id');

        $operador->permissoes()->syncWithoutDetaching($permissoes);
    }
}
