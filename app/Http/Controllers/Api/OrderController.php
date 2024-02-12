<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList()
    {
        try {
                $orders = OrderDetail::with('order','product')
                    ->select('id','product_id','order_id','qty','price','status')
                    ->get();

                return response()->json([
                    'status' => 200,
                    'message' => 'success',
                    'orders' => '$orders'
                ]);

        } catch (Exception $exception) {
            return response()->json([
                'status' => 422,
                'message' => 'error',
                'error' => $exception ->gerMessage()
            ]);
        }
    }
}
