<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {
        $userConfirmationCountings = OrderStatus::where('status_id',1)->count();
     
        return view('admin.dashboard',compact('userConfirmationCountings'));
    }
}
