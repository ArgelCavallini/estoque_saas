<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'empresa_id',
        'nome',
        'estoque_minimo',
        'ativo',
    ];

    public function saldoAtual()
    {
        return $this->movimentacoes()
            ->join('tipos_movimentacao', 'tipos_movimentacao.id', '=', 'estoque_movimentacoes.tipo_id')
            ->selectRaw('SUM(quantidade * fator) as saldo')
            ->value('saldo') ?? 0;
    }

    public function movimentacoes()
    {
        return $this->hasMany(EstoqueMovimentacao::class);
    }
}
