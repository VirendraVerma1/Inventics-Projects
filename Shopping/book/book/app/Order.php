<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;



    protected $fillable = [
        'order_number',
        'shop_id',
        'customer_id',
        'ship_to',
        'shipping_zone_id',
        'shipping_rate_id',
        'packaging_id',
        'item_count',
        'quantity',
        'shipping_weight',
        'taxrate',
        'total',
        'discount',
        'shipping',
        'packaging',
        'handling',
        'taxes',
        'grand_total',
        'billing_address',
        'shipping_address',
        'shipping_date',
        'delivery_date',
        'tracking_id',
        'coupon_id',
        'carrier_id',
        'message_to_customer',
        'send_invoice_to_customer',
        'admin_note',
        'buyer_note',
        'payment_method_id',
        'payment_date',
        'payment_status',
        'order_status_id',
        'goods_received',
        'approved',
        'feedback_id',
        'disputed',
        'email'
    ];
    
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function inventories()
    {
        // return $this->belongsToMany(Inventory::class, 'order_items')->using(OrderItem::class)
        // ->withPivot(['item_description', 'quantity', 'unit_price','feedback_id'])->withTimestamps();

        return $this->belongsToMany(Inventory::class, 'order_items')
        ->withPivot(['inventory_id','item_description', 'quantity', 'unit_price','feedback_id'])->withTimestamps();
    }
}
