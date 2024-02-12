<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\OrderController;
use App\Models\orderdetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function orderManage()
   {
    $orders = orderdetail::with('order','product')->get();
   return view('backend.pages.order.orders', compact('orders'));
   }
}
