<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits;
class Category extends Model
{
    use SoftDeletes;
    use Traits\SearchTrait;
    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }
}
