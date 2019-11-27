<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    protected $table="sports";
    protected $guarded = ['id'];
}
