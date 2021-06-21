<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits;
class Tag extends Model
{
    use SoftDeletes;
    use Traits\SearchTrait;
    public function blogs()
    {
        return $this->belongsToMany('App\Blog');
    }
}
