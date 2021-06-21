<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items')
        ->withPivot('item_description', 'quantity', 'unit_price')->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
        ->withPivot('item_description', 'quantity', 'unit_price', 'feedback_id')->withTimestamps();
    }
}
