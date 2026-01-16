<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nome', 'is_admin_global'];

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
