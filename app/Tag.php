<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function sites() {
        return $this->belongsToMany('\App\Tag')->withTimestamps();;
    }

    public function getTagsForCheckboxes() {

        $tags = $this->orderBy('name','ASC')->get();

        $tagsForCheckboxes = [];

        foreach($tags as $tag) {
            $tagsForCheckboxes[$tag['id']] = $tag;
        }

        return $tagsForCheckboxes;

    }
}
