<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $guarded = [];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
