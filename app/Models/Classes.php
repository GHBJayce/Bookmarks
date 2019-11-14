<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $primaryKey = 'cid';
    protected $fillable = ['uid', 'name', 'pid', 'sort'];
}
