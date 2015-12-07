<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Site extends Model{
    public function tags()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\App\Tag')->withTimestamps();
    }
}
