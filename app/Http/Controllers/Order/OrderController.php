<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function userOrderConfirm($id)
    {
        //dd($id);
        $orderDetail = Order::with('orderDetail','orderDetail.product','OrderBillingAddress','OrderSiteAddress')
        ->where('id',$id)
        ->first();
        dd($orderDetail);
        return view('user/userOrderConfirm');
    }
}
