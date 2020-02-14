<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtemplate extends Model
{
    //
    protected $guarded = [];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
