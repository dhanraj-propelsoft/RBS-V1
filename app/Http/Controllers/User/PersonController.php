<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\OrganizationEmail;
use App\Models\OrganizationMobile;
use App\Models\Person;
use App\Models\PersonAddress;
use App\Models\PersonEmail;
use App\Models\PersonMobile;
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
            if ($personType->type_id) {
                dd("agent");
            }
        } elseif ($orgmodel) {
            dd("Party");
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

    public function storeUserCredential(Request $request)
    {

        $userType = $request->userType;
        if ($userType == 1) {
            $OrgModels = $this->convertToOrganizationModel($request->all());
        } else {
            $PersonModels = $this->convertToPersonModel($request->all());
        }
        $ServiceTypes = ServiceType::where('status', 1)->get();
        $productModels = Product::where('status', 1)->get();
        return view('user.orderDetails', compact('ServiceTypes', 'productModels'));
    }

    public function convertToOrganizationModel($datas)
    {
        $datas = (object)$datas;

        $orgModel = new Organization();
        $orgModel->organization_name = $datas->organizationName;
        $orgModel->gst = $datas->gst;
        $orgModel->save();

        $orgMobileModel = new OrganizationMobile();
        $orgMobileModel->organization_id = $orgModel->id;
        $orgMobileModel->mobile_no = $datas->mobileNumber;
        $orgMobileModel->save();

        $orgEmailModel = new OrganizationEmail();
        $orgEmailModel->organization_id = $orgModel->id;
        $orgEmailModel->email = $datas->personEmail;
        $orgEmailModel->save();
        return true;
    }

    public function convertToPersonModel($datas)
    {
        $datas = (object)$datas;

        $personModel = new Person();
        $personModel->name = $datas->name;
        $personModel->save();

        $personMobile = new PersonMobile();
        $personMobile->person_id = $personModel->id;
        $personMobile->mobile_no = $datas->mobileNumber;
        $personMobile->save();

        $personEmail = new PersonEmail();
        $personEmail->person_id = $personModel->id;
        $personEmail->email = $datas->email;
        $personEmail->save();

        $personEmail = new PersonType();
        $personEmail->person_id = $personModel->id;
        $personEmail->type_id = 2;
        $personEmail->save();

        return true;
    }
    public function storeOrder(Request $request)
    {
        dd($request->all());
    }
}
