<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
      {
           Empresa::create([
               'nome' => 'Empresa Demo',
               'cnpj' => null,
               'ativo' => true,
           ]);
      }
}