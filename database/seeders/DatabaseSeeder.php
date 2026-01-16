<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            EmpresaSeeder::class,
            PermissaoSeeder::class,
            RoleSeeder::class,
            MenuSeeder::class,
        ]);

        $user = User::factory()->create([
            'name' => 'Argel Cavallini',
            'email' => 'argel_095@hotmail.com',
            'empresa_id' => 1,
            'password' => bcrypt('123456789'),
        ]);

        // 🔥 VINCULAR ROLE ADMIN GLOBAL
        $adminRole = Role::where('is_admin_global', true)->first();

        if ($adminRole) {
            $user->roles()->syncWithoutDetaching([$adminRole->id]);
        }
    }
}
