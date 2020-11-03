<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'RFC';
    public $incrementing = false;
    public $timestamps = false;
}
