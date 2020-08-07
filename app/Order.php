<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'billing_email',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_province',
        'billing_country',
        'billing_postalcode',
        'billing_phone',
        'billing_name_on_card',
        'billing_discount_details',
        'billing_discount',
        'billing_subtotal',
        'billing_tax',
        'billing_total',
        'billing_order_notes',
        'payment_gateway',
        'shipped',
        'error'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
