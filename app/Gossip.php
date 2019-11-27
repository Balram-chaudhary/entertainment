<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gossip extends Model
{
    protected $table="gossip";
    protected $guarded = ['id'];
}
