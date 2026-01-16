<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Support\Collection;

class MenuService
{
    public static function getMenusForUser(): Collection
    {
        $user = auth()->user();

        if ($user->isAdminGlobal()) {
            return Menu::whereNull('menu_pai_id')
                ->where('ativo', true)
                ->orderBy('ordem')
                ->with('filhos')
                ->get();
        }

        return Menu::whereNull('menu_pai_id')
            ->where('ativo', true)
            ->whereHas('permissao.roles.users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })
            ->orderBy('ordem')
            ->with('filhos')
            ->get();
    }
}
