<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdminGlobal(): bool
    {
        return $this->roles()->where('is_admin_global', true)->exists();
    }

    public function hasPermissao(string $permissao): bool
    {
        if ($this->isAdminGlobal()) {
            return true;
        }

        return $this->roles()
            ->whereHas('permissoes', function ($q) use ($permissao) {
                $q->where('nome', $permissao);
            })
            ->exists();
    }

}
