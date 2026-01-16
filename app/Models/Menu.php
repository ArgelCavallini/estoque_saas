<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'nome',
        'rota',
        'icone',
        'ordem',
        'menu_pai_id',
        'permissao_id',
        'ativo',
    ];

    public function permissao()
    {
        return $this->belongsTo(Permissao::class);
    }

    public function filhos()
    {
        return $this->hasMany(Menu::class, 'menu_pai_id')
        ->where('ativo', true)
        ->orderBy('ordem');
    }
}
