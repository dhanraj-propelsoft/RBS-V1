<?php

namespace App\Http\Controllers\Admin\ServiceType;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetails;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = ServiceType::where('status', 1)->get(['id'])->toArray();
        $results = collect($service)->map(function ($data) {
            return ServiceType::select('service_types.id', 'service_types.service_name', 'service_details.eff_date', 'service_details.special_price', 'service_details.mrp')
                ->leftJoin('service_details', 'service_details.service_id', '=', 'service_types.id')
                ->whereIn('service_details.service_id', $data)
                ->orderBy('service_details.id', 'desc')
                ->first();
        })->toArray();
        return view('admin/service/serviceList', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/service/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datas = $request->all();
        if (isset($request->service_id)) {
            $service_details = ServiceDetails::where('service_id', $request->service_id)->delete();
            $model = ServiceType::where('id', $request->service_id)->first();
        } else {
            $model = new ServiceType();
        }
        $model->service_name = $request->serviceName;
        $model->description = $request->description;
        $model->status = 1;
        $model->save();
        if ($model->id && isset($request->effectiveDate[0]) && $request->effectiveDate[0] !== null) {
            foreach ($datas['effectiveDate'] as $key => $effectiveDate) {
                $detail = new ServiceDetails();
                $detail->service_id = $model->id;
                $detail->eff_date = $effectiveDate;
                $detail->mrp = $datas['mrp'][$key];
                $detail->special_price = $datas['specialPrice'][$key];
                $detail->save();
            }
        }
        return redirect()->route('ServiceType.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = ServiceType::where('id', $id)->first()->toArray();
        $service_array = ServiceType::select('*')
            ->leftJoin('service_details', 'service_details.service_id', '=', 'service_types.id')
            ->where('service_types.id', $id)
            ->orderBy('service_details.id', 'desc')
            ->get()
            ->toArray();

        return view('admin/service.edit', compact('service', 'service_array'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function serviceDestory(Request $request)
    {
        if ($request->id) {
            $product = ServiceType::where('id', $request->id)->delete();
            $product_array = ServiceDetails::where('product_id', $request->id)->delete();
        }
        return true;
    }
}
