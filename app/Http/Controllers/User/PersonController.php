<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderAccounting;
use App\Models\OrderBillingAddress;
use App\Models\OrderDetails;
use App\Models\OrderPersons;
use App\Models\orders;
use App\Models\OrderServices;
use App\Models\OrderSiteDetails;
use App\Models\OrderStatus;
use App\Models\OrderTransactions;
use App\Models\Organization;
use App\Models\OrganizationEmail;
use App\Models\OrganizationMobile;
use App\Models\Person;
use App\Models\PersonEmail;
use App\Models\PersonMobile;
use App\Models\PersonType;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ServiceDetails;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonController extends Controller
{
    public function findByMobileNumber(Request $request)
    {

        $mobileNo = $request->phoneNumber;
        $model = PersonMobile::where('mobile_no', $mobileNo)->first();
        $orgmodel = OrganizationMobile::where('mobile_no', $mobileNo)->first();
        if ($model) {
            $personType = PersonType::where('person_id', $model->id)->first();
            $type = "agent";
            return view('existingUser', compact('mobileNo', 'type'));
        } elseif ($orgmodel) {
            $type = "party";
            return view('existingUser', compact('mobileNo', 'type'));
        } else {
            return view('user.userType', compact('mobileNo'));
        }
    }
    public function setUserType(Request $request)
    {

        $mobileNo = $request->mobileNo;
        $userType = $request->userConfirm;
        if ($userType == 1) {

            return view('user.organizationProfile', compact('mobileNo', 'userType'));
        } else {

            return view('user.personProfile', compact('mobileNo', 'userType'));
        }
    }
    public function personStore(Request $request)
    {

        $userType = $request->userType;
        $datas = $request->all();
        $personModels = $this->convertToPersonModel($datas, $userType);
        $personId = (isset($personModels['id'])) ? $personModels['id'] : "";
        $mobile = (isset($personModels['mobile'])) ? $personModels['mobile'] : "";
        $type = "party";
        $ServiceTypes = $this->getServiceType();
        $productModels = $this->getProduct();

        if (isset($request->link) && $request->link == 'admin') {

            return view('admin.order.orderDetails', compact('ServiceTypes', 'mobile', 'productModels', 'personId', 'type', 'userType'));
        } else {

            return view('user.orderDetails', compact('ServiceTypes', 'productModels', 'type', 'userType', 'personId'));
        }
    }
    public function agentStore(Request $request)
    {

        $userType = $request->userType;
        $personModels = $this->convertToPersonModel($request->all(), $userType);
        $personId = (isset($personModels['id'])) ? $personModels['id'] : "";
        $mobile = (isset($personModels['mobile'])) ? $personModels['mobile'] : "";
        $OrgModels = $this->convertToOrganizationModel($request->all(), $personId);
        $type = "agent";
        $ServiceTypes = $this->getServiceType();
        $productModels = $this->getProduct();

        if (isset($request->link) && $request->link == 'admin') {

            return view('admin.order.orderDetails', compact('ServiceTypes', 'mobile', 'type', 'productModels', 'personId', 'userType'));
        } else {

            return view('user.orderDetails', compact('ServiceTypes', 'productModels', 'type', 'personId', 'userType'));
        }
    }
    public function storeUserCredential(Request $request)
    {

        $userType = $request->userType;
        if ($userType == 1) {

            $personModels = $this->convertToPersonModel($request->all());
            $personId = (isset($personModels['id'])) ? $personModels['id'] : "";

            $OrgModels = $this->convertToOrganizationModel($request->all(), $personId);
            $type = "agent";
        } else {
            $PersonModels = $this->convertToPersonModel($request->all());
            $type = "party";
        }
        $ServiceTypes = $this->getServiceType();
        $productModels = $this->getProduct();

        return view('user.orderDetails', compact('ServiceTypes', 'productModels', 'type'));
    }
    public function getServiceType()
    {
        return ServiceType::where('status', 1)->get();
    }

    public function getProduct()
    {
        return Product::where('status', 1)->get();
    }
    public function orderpage($type)
    {

        $ServiceTypes = $this->getServiceType();
        $productModels = $this->getProduct();

        return view('user.orderDetails', compact('ServiceTypes', 'productModels', 'type'));
    }
    public function convertToOrganizationModel($datas, $personId = null)
    {
        $datas = (object) $datas;
        if ($datas->organizationName) {
            $orgModel = new Organization();
            $orgModel->organization_name = $datas->organizationName;
            $orgModel->gst = $datas->gst;
            $orgModel->plot_number = $datas->blockPlotNumber;
            $orgModel->street = $datas->street;
            $orgModel->city = $datas->city;
            if ($personId) {
                $orgModel->person_id = $personId;
            }
            $orgModel->save();

            // $orgMobileModel = new OrganizationMobile();
            // $orgMobileModel->organization_id = $orgModel->id;
            // $orgMobileModel->mobile_no = $datas->mobileNumber;
            // $orgMobileModel->save();
            if (isset($datas->organizationEmail)) {
                $orgEmailModel = new OrganizationEmail();
                $orgEmailModel->organization_id = $orgModel->id;
                $orgEmailModel->email = $datas->organizationEmail;
                $orgEmailModel->save();
            }
        }
        return true;
    }

    public function convertToPersonModel($datas, $userType = null)
    {

        $datas = (object) $datas;
        $personModel = [];
        if (isset($datas->personName)) {

            $personModel = new Person();
            $personModel->name = $datas->personName;
            $personModel->designation = isset($datas->personDesignation) ? $datas->personDesignation : null;
            $personModel->save();

            $personType = new PersonType();
            $personType->person_id = $personModel->id;
            $personType->type_id = $userType;
            $personType->save();

            if (isset($datas->mobileNumber)) {

                $personMobile = new PersonMobile();
                $personMobile->person_id = $personModel->id;
                $personMobile->mobile_no = $datas->mobileNumber;
                $personMobile->save();
            }
            if (isset($datas->personEmail)) {

                $personEmail = new PersonEmail();
                $personEmail->person_id = $personModel->id;
                $personEmail->email = isset($datas->personEmail) ? $datas->personEmail : null;
                $personEmail->save();
            }
        }
        if ($personModel) {
            $res = ['response' => "Success", 'id' => $personModel->id, 'mobile' => $personMobile->mobile_no];
            return $res;
        } else {

            $res = ['response' => "Failed"];
            return $res;
        }
    }
    public function storeOrder(Request $request)
    {

        $order = $this->Orders();
        $order_id = $order['id'];
        $datas = $request->all();
        $datas = (object) $datas;
        $site_details = $this->convertOrderSiteDetails($datas, $order_id);
        $orderStatus = $this->convertOrderStatus($order_id);
        $order_details = $this->convertOrderDetails($datas, $order_id);
        $billing_address = $this->convertOrderBillingAddress($datas, $order_id);
        $service_type = $this->orderServiceTypes($request->all(), $order_id);
        $order_transaction = $this->orderTransaction($request->all(), $order_id);
        if (isset($datas->partyDetails) && $datas->partyDetails == 1) {
            $order_status = $this->partyDetails($datas->personId, $order_id,1);
            $storePerson = $this->convertToPersonModel($datas, 2);
            $Party_details = $this->partyDetails($storePerson['id'], $order_id, 2);
        } else if (isset($datas->engineerDetails) && $datas->engineerDetails == 2) {
            $order_status = $this->partyDetails($datas->personId, $order_id,2);
            $storePerson = $this->convertToPersonModel($datas, 1);
            $Party_details = $this->partyDetails($storePerson['id'], $order_id, 1);
        } else{
            $order_status = $this->partyDetails($datas->personId, $order_id);
        }
        return redirect()->route('userOrderConfirm', ['id' => $order_id]);

    }
    public function Orders()
    {
        $orderAccountingModel = OrderAccounting::first();
        if ($orderAccountingModel) {
            $orderAccountingModel->genNo = $orderAccountingModel->gen_no + 1;
            $orderAccountingModel->save();
        }
        $genNo = isset($orderAccountingModel->genNo) ? $orderAccountingModel->genNo : 1;
        $orderNo = "ABCD@" . $genNo;

        $model = new orders();
        $model->order_id = $orderNo;
        $model->status = 1;
        $model->save();
        return $model;
    }
    public function partyDetails($personId, $orderId = null, $type = null)
    {

        $model = new OrderPersons();
        $model->order_id = $orderId;
        $model->person_type = $type;
        $model->person_id = $personId;
        $model->save();
        return $model;
    }
    public function convertOrderSiteDetails($datas, $orderId = null)
    {
        $datas = (object) $datas;
        $model = new OrderSiteDetails();
        $model->order_id = $orderId;
        $model->site_name = $datas->siteName;
        $model->plot_number = $datas->siteNumber;
        $model->street = $datas->street;
        $model->city = $datas->city;
        $model->land_mark = $datas->landmark;
        $model->save();
    }
    public function convertOrderDetails($datas, $orderId = null)
    {
        $datas = (object) $datas;
        $model = new OrderDetails();
        $model->order_id = $orderId;
        $model->date_time_of_supply = $datas->date_time;
        $model->product_id = $datas->conGrade;
        $model->quantity = $datas->quantity;
        $model->remark = $datas->Remarks;
        $model->created_by=$datas->personId;
        $model->save();
        return $model;
    }
    public function convertOrderBillingAddress($datas, $orderId = null)
    {
        $datas = (object) $datas;
        $model = new OrderBillingAddress();
        $model->order_id = $orderId;
        $model->billing_name = $datas->billingName;
        $model->plot_number = $datas->blockPlotNumber;
        $model->street = $datas->streetCityState;
        $model->city = $datas->cities;
        $model->status = 1;
        $model->save();
        return $model;
    }
    public function convertOrderStatus($orderId)
    {

        $model = new OrderStatus();
        $model->order_id = $orderId;
        $model->status_id = 1;
        $model->save();
        return $model;
    }
    public function orderServiceTypes($datas, $orderId = null)
    {

        if (isset($datas['ServiceType'])) {
            $ServiceType = count($datas['ServiceType']);
            for ($i = 0; $i < $ServiceType; $i++) {
                $model[$i] = new OrderServices();
                $model[$i]->order_id = $orderId;
                $model[$i]->service_id = $datas['ServiceType'][$i];
                $model[$i]->save();
            }
            return true;
        }
    }
    public function orderTransaction($datas, $orderId = null)
    {

        Log::info('starting OrderTransaction Function ' . json_encode($datas));

        $product_rate = $datas['ratePerCube'];
        $quantity = $datas['quantity'];
        $amount = $product_rate * $quantity;
        Log::info('OrderTransaction Function get Amount ' . json_encode($amount));

        if (isset($datas['ServiceType'])) {
            Log::info('OrderTransaction Function ServiceType function');
            $serviceIds = $datas['ServiceType'];
            $service_rate = 0;
            for ($i = 0; $i < count($serviceIds); $i++) {
                $values = ServiceDetails::where('service_id', $serviceIds[$i])
                    ->whereDate('eff_date', '<=', date('Y-m-d'))
                    ->latest('id')
                    ->first();
                Log::info('OrderTransaction Function get ServiceTypeValues ' . json_encode($values));
                if ($values) {
                    $service_rate += (int) $values["special_price"];
                }
            }
            Log::info('OrderTransaction Function get Service Rate ' . json_encode($service_rate));
        }
        $service = isset($service_rate) ? $service_rate : 0;
        Log::info('OrderTransaction Function get Service Total Amount ' . json_encode($service));
        $total = $amount + $service;

        Log::info('OrderTransaction Function get net Total Amount ' . json_encode($total));

        $balance = $total - $datas['advance'];
        Log::info('OrderTransaction Function get balance Total Amount ' . json_encode($balance));

        $model = new OrderTransactions();
        $model->order_id = $orderId;
        $model->total_amount = $total;
        $model->advance = $datas['advance'];
        $model->balance_amount = $balance;
        $model->save();
        return $model;
    }
    public function checkPerson(Request $request)
    {

        $mobile = $request->mobile;
        $personId = $request->personId;
        $userType = $request->userType;
        if ($request->userType == 1) {
            $type = 'agent';
        } else if ($request->userType == 2) {
            $type = 'party';
        } else if ($request->userType == 3) {
            $type = 'customer';
        } else if ($request->userType == 4) {
            $type = 'engineer';
        } else {
            $type = 0;
        }

        if ($personId) {
            $ServiceTypes = $this->getServiceType();
            $productModels = $this->getProduct();
            return view('admin.order.orderDetails', compact('ServiceTypes', 'mobile', 'productModels', 'personId', 'userType', 'type'));
        }
    }
    public function addNewOrder(Request $request)
    {
        $models = Person::select('persons.id', 'persons.name', 'persons.designation', 'person_types.type_id', 'person_mobiles.mobile_no', 'person_emails.email', 'organizations.organization_name')
            ->leftjoin('person_mobiles', 'person_mobiles.person_id', '=', 'persons.id')
            ->leftjoin('person_types', 'person_types.person_id', '=', 'persons.id')
            ->leftjoin('person_emails', 'person_emails.person_id', '=', 'persons.id')
            ->leftjoin('organizations', 'organizations.person_id', '=', 'persons.id')
            ->get()->toArray();

        return view('admin.order.addOrder', compact('models'));
    }
    public function createAccount(Request $request)
    {
        $userType = $request->userConfirm;
        $mobile = $request->mobileNumber;
        $ServiceTypes = $this->getServiceType();
        $productModels = $this->getProduct();
        if (isset($request->userConfirm) && $request->userConfirm == 1) {
            return view('admin.order.organizationProfile', compact('productModels', 'ServiceTypes', 'mobile', 'userType'));
        } else if (isset($request->userConfirm) && $request->userConfirm == 2) {
            return view('admin.order.personProfile', compact('productModels', 'ServiceTypes', 'mobile', 'userType'));
        }
    }
    public function getPriceByProduct_id(Request $request)
    {
        if ($request->id) {

            return ProductDetail::where('product_id', $request->id)
                ->whereDate('eff_date', '<=', date('Y-m-d'))
                ->latest('id')
                ->first();
        } else {
            return false;
        }
    }
    public function checkMobileNumberForAgent(Request $request)
    {
        if ($request->number) {
            $model = Person::select('persons.id')
                ->leftjoin('person_mobiles', 'person_mobiles.person_id', '=', 'persons.id')
                ->leftjoin('person_types', 'person_types.person_id', '=', 'persons.id')
                ->where('person_types.type_id', 1)
                ->where('person_mobiles.mobile_no', $request->number)
                ->first();
            if ($model) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function checkMobileNumberForParty(Request $request)
    {
        if ($request->number) {
            $model = Person::select('persons.id')
                ->leftjoin('person_mobiles', 'person_mobiles.person_id', '=', 'persons.id')
                ->leftjoin('person_types', 'person_types.person_id', '=', 'persons.id')
                ->where('person_types.type_id', 2)
                ->where('person_mobiles.mobile_no', $request->number)
                ->first();
            if ($model) {
                return true;
            } else {
                return false;
            }
        }
    }
}
