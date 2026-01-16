<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = 'permissoes';

    protected $fillable = ['nome'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
