<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
   protected $table="quotes";
    protected $guarded = ['id'];
}
