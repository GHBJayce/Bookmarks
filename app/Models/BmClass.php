<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmClass extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'cid';
    protected $fillable = ['uid', 'name', 'pid'];
}
