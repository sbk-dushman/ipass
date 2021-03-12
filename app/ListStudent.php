<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListStudent extends Model
{
    public function group()
    {
        $this->belongsTo(ListStudent::class);
    }
}
