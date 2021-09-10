<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
