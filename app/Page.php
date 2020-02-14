<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
