<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    protected $primaryKey = 'bm_id';
    protected $fillable = ['uid', 'title', 'url', 'access_num', 'last_access_time', 'is_like'];
}
