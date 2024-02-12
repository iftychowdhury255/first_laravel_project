<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('frontend.home.index',compact('products'));
    }
    public function shopPage()
    {
        return view('frontend.pages.shop');
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        return view('frontend.pages.details',[
            'product' => $product
        ]);
    }

    public function productAddToCart(Request $request)
    {
        $checkCartProduct = Cart::where('product_id',$request->product_id)->first();

        
        if ($checkCartProduct) {
            if($request->qty){
                $checkCartProduct->qty = $checkCartProduct->qty + $request->qty;
                $checkCartProduct->save();
            }else{
                $checkCartProduct->qty = $checkCartProduct->qty +1;
                $checkCartProduct->save();
            }
        }
        else{

            Cart::create([
                'product_id' => $request->product_id,
                'price' => $request->price,
                'qty' => $request->qty ? $request->qty : 1,
                'ip_address' => $request->ip()
            ]);
        }
        $this->setSuccessMassage('success','the product Add to Cart');
        return redirect()->back();
    }

    public function cartDelete($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();

        $this->setSuccessMassage('success','product deleted form cart');
        return redirect()->back();
    }

    public function viewCartProducts()
    {
        return view('frontend.pages.cart');
    }
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }

    public function customerConfirmedOrder(Request $request)
    {
        $order = Order::create([
            'ip_address' => $request->ip(),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'total_qty' => $request->total_qty,
            'total_price' => $request->total_price,
        ]);

        // Order Details
        foreach($request->product_id as $key => $orderdetail){
            Orderdetail::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id[$key],
                'price' => $request->price[$key],
                'qty' => $request->qty[$key],
            ]);
        } 
        // cart remove
        foreach($request->product_id as $cartProductRemove){
            $remove = Cart::where('product_id',$cartProductRemove)->first();
            $remove->delete();

            
        }  
        $this->setSuccessMassage('success','order has been completed');
            return redirect()->back(); 
    }
    public function directCartOrder(){
        return view('frontend.pages.checkout');
    }
    
}
