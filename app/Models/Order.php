<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status',
        'shipping_address',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}