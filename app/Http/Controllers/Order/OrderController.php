<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function userOrderConfirm($id)
    {
        $orderData = Order::with('orderDetail', 'orderDetail.product', 'OrderBillingAddress', 'OrderSiteAddress', 'OrderService', 'OrderService.service', 'OrderTransaction')
            ->where('orders.id', $id)
            ->first();

        $supplyDate = "";
        $siteAddress = "";
        $product = "";
        $service = "";
        $billingAddress = "";
        $quantity = "";
        $remark = "";
        $netAmount = "";
        $advance = "";
        $orderDetail = $orderData['orderDetail'];
        $orderSiteAddress = $orderData['OrderSiteAddress'];
        $orderBillingAdress = $orderData['OrderBillingAddress'];
        $orderService = $orderData['OrderService'];
        $orderTransaction = $orderData['OrderTransaction'];
        if ($orderTransaction) {
            $netAmount = $orderTransaction->total_amount;
            $advance = $orderTransaction->advance;
        }
        if ($orderService) {
            $serviceModel = $orderService->service;
            $service = $serviceModel->service_name;
        }
        if ($orderDetail) {
            $supplyDate = $orderDetail->date_time_of_supply;
            $quantity = $orderDetail->quantity;
            $remark = $orderDetail->remark;
            $productModel = $orderDetail->product;
            if ($productModel) {
                $product = $productModel->product_name;
            }
        }
        if ($orderSiteAddress) {
            $site_name = ($orderSiteAddress->site_name) ? $orderSiteAddress->site_name . ',' : '';
            $plot_number = ($orderSiteAddress->plot_number) ? $orderSiteAddress->plot_number . ',' : '';
            $street = ($orderSiteAddress->street) ? $orderSiteAddress->street . ',' : '';
            $city = ($orderSiteAddress->city) ? $orderSiteAddress->city : '';
            $siteAddress = $site_name . $plot_number . $street . $city;
        }
        if ($orderBillingAdress) {
            $billing_name = ($orderBillingAdress->billing_name) ? $orderBillingAdress->billing_name . ',' : '';
            $plot_number = ($orderBillingAdress->plot_number) ? $orderBillingAdress->plot_number . ',' : '';
            $street = ($orderBillingAdress->street) ? $orderBillingAdress->street . ',' : '';
            $city = ($orderBillingAdress->city) ? $orderBillingAdress->city : '';
            $billingAddress = $billing_name . $plot_number . $street . $city;
        }

        $datas = compact(
            'supplyDate',
            'siteAddress',
            'product',
            'service',
            'billingAddress',
            'quantity',
            'remark',
            'netAmount',
            'advance'
        );

        return view('user/userOrderConfirm')->with($datas)->with('id', $id);
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
    public function orderRequest()
    {
        $models = Order::with('orderDetail', 'OrderStatus', 'orderDetail.product', 'orderDetail.creator', 'orderDetail.creator.personMobile', 'OrderBillingAddress', 'OrderSiteAddress', 'OrderService', 'OrderService.service', 'OrderTransaction')
            ->get();
        $modelDatas = array();
        foreach ($models as $model) {

            $orderDetail = $model->orderDetail;
            $orderSiteAddress = $model->OrderSiteAddress;
            $OrderStatus =  $model->OrderStatus;

            $orderBy = Carbon::parse($model->created_at)->format('d-m-Y');
            $id = $model->id;
            $customerDetail = "";
            $siteAddress = "";
            $status = "";

            if ($orderDetail) {
                $creatorModel = $orderDetail->creator;
                $creatorName = "";
                $creatorMobile = "";
                if ($creatorModel) {
                    $creatorName = $creatorModel->name;
                    $personMobile = $creatorModel->personMobile;

                    if ($personMobile) {
                        $creatorMobile = $personMobile->mobile_no;
                    }
                }
                $customerDetail = $creatorName . ' & ' . $creatorMobile;
            }
            if ($orderSiteAddress) {
                $site_name = ($orderSiteAddress->site_name) ? $orderSiteAddress->site_name . ',' : '';
                $plot_number = ($orderSiteAddress->plot_number) ? $orderSiteAddress->plot_number . ',' : '';
                $street = ($orderSiteAddress->street) ? $orderSiteAddress->street . ',' : '';
                $city = ($orderSiteAddress->city) ? $orderSiteAddress->city : '';
                $siteAddress = $site_name . $plot_number . $street . $city;
            }
            if ($OrderStatus) {
                $status = $this->getStatusNameById($OrderStatus->status_id);
                
            }
            //dd($status);
            $response = ['id'=>$id,'customerData'=>$customerDetail,'siteAddress'=>$siteAddress,'status'=>$status,'orderBy'=>$orderBy];
           array_push($modelDatas,$response);
        }
       
        return view('admin/order/orderRequest',compact('modelDatas'));
    }

    public function getStatusNameById($id)
    {
        if ($id == 1) {
            $name = "User Conformation Pending";
        } elseif ($id == 2) {
            $name = "Admin Conformation Pending";
        } elseif ($id == 3) {
            $name = "Conformed";
        }
        return $name;
    }
}
