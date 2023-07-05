<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;

class OrderController extends Controller
{
    public function userOrderConfirm($id)
    {

        $orderDetail = Order::with('orderDetail', 'orderDetail.product', 'OrderBillingAddress', 'OrderSiteAddress')
            ->select('order_details.remark', 'order_details.quantity', 'order_details.date_time_of_supply', 'order_billing_addresses.street as billing_street', 'order_billing_addresses.city as billing_city', 'order_site_details.street as site_street', 'order_site_details.city as site_city', 'products.product_name', 'service_types.service_name', 'order_transactions.total_amount', 'order_transactions.advance')
            ->leftjoin('order_details', 'order_details.order_id', '=', 'orders.id')
            ->leftjoin('order_services', 'order_services.order_id', '=', 'orders.id')
            ->leftjoin('order_billing_addresses', 'order_billing_addresses.order_id', '=', 'orders.id')
            ->leftjoin('order_site_details', 'order_site_details.order_id', '=', 'orders.id')
            ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
            ->leftJoin('order_transactions', 'order_transactions.order_id', '=', 'orders.id')
            ->leftJoin('service_types', 'order_services.service_id', '=', 'service_types.id')
            ->where('orders.id', $id)
            ->first();
        return view('user/userOrderConfirm', compact('orderDetail', 'id'));
    }
    public function userOrderConfirmStatus($id)
    {
        if ($id) {
            $order_status = OrderStatus::where(['order_id' => $id, 'status_id' => 1])->first();
            if ($order_status) {
                $order_status = OrderStatus::where(['order_id' => $id, 'status_id' => 1])->update(['status_id' => 2]);
                return view('user.userInformation');
            }
        }
    }
}
