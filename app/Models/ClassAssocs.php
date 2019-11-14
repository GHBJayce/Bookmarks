<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassAssocs extends Model
{
    protected $primaryKey = 'ca_id';
    protected $fillable = ['uid', 'cid', 'bm_id'];
    public $timestamps = false;
}
