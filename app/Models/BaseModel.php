<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseModel extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('empresa', function (Builder $query) {
            if (auth()->check()) {
                $query->where(
                    $query->getModel()->getTable() . '.empresa_id',
                    auth()->user()->empresa_id
                );
            }
        });

        static::creating(function ($model) {
            if (auth()->check() && empty($model->empresa_id)) {
                $model->empresa_id = auth()->user()->empresa_id;
            }
        });
    }
}
