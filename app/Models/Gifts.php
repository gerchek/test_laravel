<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(Posts::class);
    }

    // public function level()
    // {
    //     // return $this->belongsTo();
    //     return $this->belongsTo(Gifts::class, 'foreign_key');
    // }

    public function parent() {
         return $this->belongsTo(Gifts::class, 'parent_id', 'id');
    }

    public function child() {
         return $this->hasMany(Gifts::class, 'parent_id', 'id');
    }
    
}
