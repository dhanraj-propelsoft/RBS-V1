<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderDetail()
    {
        return $this->hasOne(OrderDetails::class, 'order_id', 'id');
    }
    public function OrderBillingAddress()
    {
        return $this->hasOne(OrderBillingAddress::class, 'order_id', 'id');
    }
    public function OrderSiteAddress()
    {
        return $this->hasOne(OrderSiteDetails::class, 'order_id', 'id');
    }

    public function OrderService()
    {
        return $this->hasOne(OrderServices::class, 'order_id', 'id');
    }
    public function OrderTransaction()
    {
        return $this->hasOne(OrderTransactions::class, 'order_id', 'id');
    }
    public function OrderStatus()
    {
        return $this->hasOne(OrderStatus::class, 'order_id', 'id');
    }
}
