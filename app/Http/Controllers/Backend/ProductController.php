<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\ProductController;
use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function productAdd()
   {
   $categories = Category::orderBy('id','desc')->get();
    return view('backend.pages.product.add',compact('categories'));
   }

   public function productStore(Request $request)
   {
      $imageName = time(). '.' .$request->image->extension();
        $request->image->move('image/', $imageName);

        $product = new Product();
        $product->category_id= $request->category_id;
        $product->name= $request->name;
        $product->price= $request->price;
        $product->qty= $request->qty;
        $product->short_description= $request->short_description;
        $product->long_description= $request->long_description;
        $product->type= $request->type;
        $product->image= $imageName;
        $product->save();
      
        $this->setSuccessMassage('success','Category Has Been inserted');
        return redirect()->back();
    }

    public function productManage()
    {
      $products = Product::with('Category')->orderBy('id','desc')->get();
      return view('backend.pages.product.manage',compact('products'));
    }

    public function productDelete($id)
    {
      $product = Product::find($id);
      $product->delete();
      $this->setSuccessMassage('success','Category Has Been Deleted');
        return redirect()->back();
    }

   
}

