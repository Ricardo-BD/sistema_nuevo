<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Entity::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Entity::class, 'parent_id');
    }
}
