<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function incrementViewsCount() {
        $this->views++;
        return $this->save();
    }
}
