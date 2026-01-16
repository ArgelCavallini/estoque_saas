<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueMovimentacao extends BaseModel
{
    protected $table = 'estoque_movimentacoes';

    protected $fillable = [
        'empresa_id',
        'produto_id',
        'tipo_id',
        'quantidade',
        'observacao',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function tipo()
    {
        return $this->belongsTo(TipoMovimentacao::class, 'tipo_id');
    }
}