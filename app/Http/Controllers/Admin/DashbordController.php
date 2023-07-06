<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Order\OrderController;
use App\Models\Order;
use App\Models\OrderStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    protected $OrderController;
    public function __construct(OrderController $OrderController ) {
        $this->OrderController = $OrderController;
    }
    public function index()
    {
        $userConfirmationCountings = OrderStatus::where('status_id', 1)->count();
        $adminConfirmationCountings = OrderStatus::where('status_id', 2)->count();
        $confirmedCountings = OrderStatus::where('status_id', 3)->count();
        $deliveredCountings = OrderStatus::where('status_id', 4)->count();
        $canceledCountings = OrderStatus::where('status_id', 5)->count();
       
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
                $status = $this->OrderController->getStatusNameById($OrderStatus->status_id);
                
            }
           
            $response = ['id'=>$id,'customerData'=>$customerDetail,'siteAddress'=>$siteAddress,'status'=>$status,'orderBy'=>$orderBy];
           array_push($modelDatas,$response);
        }
        dd($modelDatas);
        return view('admin.dashboard', compact('canceledCountings','userConfirmationCountings', 'adminConfirmationCountings', 'confirmedCountings', 'deliveredCountings'));
    }
}
