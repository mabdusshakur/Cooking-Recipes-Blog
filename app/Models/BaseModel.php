<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema;

class BaseModel extends Model
{
    protected static function boot()
    {
        parent::boot();

        if(Schema::hasColumn((new static)->getTable(), 'is_deleted')) {
            static::addGlobalScope('not_deleted', function ($query) {
                $query->where('is_deleted', false);
            });
        }
    }

    public function scopeActive($query)
    {
        if (Schema::hasColumn($this->getTable(), 'is_active')) {
            return $query->where('is_active', true);
        }
        return $query;
    }
}
