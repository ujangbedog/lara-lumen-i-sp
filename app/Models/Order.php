<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array('order_number', 'customer_id', 'order_date', 'status', 'total_amount', 'shipping_address', 'payment_method');

    public $timestamps = true;
}
