<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Site extends Model{
    public function tags()
    {
        # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\p4\Tag')->withTimestamps();
    }
}
