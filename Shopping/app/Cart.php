<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'shop_id',
        'customer_id',
        'ip_address',
        'ship_to',
        'ship_to_country_id',
        'ship_to_state_id',
        'shipping_zone_id',
        'shipping_rate_id',
        'packaging_id',
        'taxrate',
        'item_count',
        'quantity',
        'total',
        'discount',
        'shipping',
        'packaging',
        'handling',
        'taxes',
        'grand_total',
        'shipping_weight',
        'shipping_address',
        'billing_address',
        'coupon_id',
        'payment_method_id',
        'payment_status',
        'message_to_customer',
        'admin_note',
    ];


    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'cart_items')
        ->withPivot('item_description', 'quantity', 'unit_price')->withTimestamps();
    }
}
