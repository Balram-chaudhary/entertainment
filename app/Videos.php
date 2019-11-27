<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table="videos";
    protected $guarded = ['id'];
}
