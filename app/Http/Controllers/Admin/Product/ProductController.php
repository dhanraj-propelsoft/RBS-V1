<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->get(['id'])->toArray();

        $results = collect($products)->map(function ($data) {
            return Product::select('products.id', 'products.product_name', 'products.rate', 'product_details.eff_date', 'product_details.special_price', 'product_details.mrp')
                ->leftJoin('product_details', 'product_details.product_id', '=', 'products.id')
                ->whereIn('product_details.product_id', $data)
                ->orderBy('product_details.id', 'desc')
                ->first();
        })->toArray();

        return view('admin/product.productList', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/product/add');
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
        if (isset($request->product_id)) {
            $product_details = ProductDetail::where('product_id', $request->product_id)->delete();
            $model = Product::where('id',$request->product_id)->first();
        } else {
            $model = new Product();
        }
        $model->product_name = $request->productName;
        $model->description = $request->description;
        $model->units = $request->units;
        $model->rate = $request->rate;
        $model->status = 1;
        $model->save();
        if ($model->id) {
            foreach ($datas['effectiveDate'] as $key => $effectiveDate) {
                $detail = new ProductDetail();
                $detail->product_id = $model->id;
                $detail->eff_date = $effectiveDate;
                $detail->mrp = $datas['mrp'][$key];
                $detail->special_price = $datas['specialPrice'][$key];
                $detail->save();
            }
        }
        return redirect()->route('product.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first()->toArray();
        $product_array = Product::select('*')
            ->leftJoin('product_details', 'product_details.product_id', '=', 'products.id')
            ->where('products.id', $id)
            ->orderBy('product_details.id', 'desc')
            ->get()
            ->toArray();
        return view('admin/product.edit', compact('product', 'product_array'));
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
    public function productDestory(Request $request)
    {
        if ($request->id) {
            $product = Product::where('id', $request->id)->delete();
            $product_array = ProductDetail::where('product_id', $request->id)->delete();
        }
        return true;
    }
}
