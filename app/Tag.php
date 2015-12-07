<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function sites() {
        return $this->belongsToMany('\App\Tag')->withTimestamps();;
    }
}
