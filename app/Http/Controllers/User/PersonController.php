<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use App\Models\OrderDetails;
use App\Models\Organization;
use App\Models\OrganizationEmail;
use App\Models\OrganizationMobile;
use App\Models\Person;
use App\Models\PersonAddress;
use App\Models\PersonEmail;
use App\Models\PersonMobile;
use App\Models\PersonServiceType;
use App\Models\PersonType;
use App\Models\Product;
use App\Models\ServiceType;
use Illuminate\Http\Request;

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

        $personModels = $this->convertToPersonModel($request->all(), 2);
        $type = "party";

        $ServiceTypes = $this->getServiceType();
        $productModels = $this->getProduct();

        return view('user.orderDetails', compact('ServiceTypes', 'productModels', 'type'));
    }
    public function agentStore(Request $request)
    {

        $personModels = $this->convertToPersonModel($request->all());
        $personId = (isset($personModels['id'])) ? $personModels['id'] : "";
        $OrgModels = $this->convertToOrganizationModel($request->all(), $personId);
        $type = "agent";
        $ServiceTypes = $this->getServiceType();
        $productModels = $this->getProduct();

        return view('user.orderDetails', compact('ServiceTypes', 'productModels', 'type', 'personId'));
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
                $personEmail->email = $datas->personEmail;
                $personEmail->save();
            }
        }
        if ($personModel) {
            $res = ['response' => "Success", 'id' => $personModel->id];
            return $res;
        } else {

            $res = ['response' => "Failed"];
            return $res;
        }
    }
    public function storeOrder(Request $request)
    {

        $site_address = $this->perosonSiteAddress($request->all());
        $order_details = $this->personOrderDetails($request->all());
        $billing_address = $this->personBillingAddress($request->all());
        $person_service_type = $this->personServiceTypes($request->all());

    }
    public function perosonSiteAddress($datas, $type = null)
    {
        $datas = (object) $datas;
        $model = new PersonAddress();
        $model->person_id = $datas->personId;
        $model->site_name = $datas->siteName;
        $model->site_plot_no = $datas->siteNumber;
        $model->street = $datas->street;
        $model->city = $datas->city;
        $model->land_mark = $datas->landmark;
        $model->party_details = isset($datas->partyDetails) ? 1 : 0;
        $model->customer_name = isset($datas->customerName) ? $datas->customerName : null;
        $model->customer_number = isset($datas->customerMobile) ? $datas->customerMobile : null;
        $model->save();

    }
    public function personOrderDetails($datas, $type = null)
    {
        $datas = (object) $datas;
        $model = new OrderDetails();
        $model->person_id = $datas->personId;
        $model->date_time = $datas->date_time;
        $model->product_id = $datas->conGrade;
        $model->rate_pre_cube = $datas->ratePerCube;
        $model->quantity = $datas->quantity;
        $model->remark = $datas->Remarks;
        $model->save();
        return $model;
    }
    public function personBillingAddress($datas, $type = null)
    {
        $datas = (object) $datas;
        $model = new BillingAddress();
        $model->person_id = $datas->personId;
        $model->person_name = $datas->personName;
        $model->block_plot_number = $datas->blockPlotNumber;
        $model->street = $datas->streetCityState;
        $model->city = isset($datas->city) ? $datas->city : null;
        $model->net_amount = $datas->netAmount;
        $model->advance = $datas->advance;
        $model->save();
        return $model;
    }
    public function personServiceTypes($datas)
    {
        $ServiceType = count($datas['ServiceType']);
        if($ServiceType){
            for ($i = 0; $i < $ServiceType; $i++) {
                $model[$i] = new PersonServiceType();
                $model[$i]->person_id = $datas['personId'];
                $model[$i]->service_type_id = $datas['ServiceType'][$i];
                $model[$i]->save();
            }
            return true;
        }

    }
}
