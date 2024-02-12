<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\requests\categoryRequest;
use App\Models\Category;

class BackendController extends Controller
{
    public function CategoryAdd()
    {
        return view('backend.pages.category.add');
    }
    public function CategoryManage()
    {
        $categories = Category::select(['id','name','image'])->orderBy('created_at','desc')->get();
        return view('backend.pages.category.manage',compact('categories'));
    }
    public function CategoryStore(categoryRequest $request)
    
    {
        
        $imageName = time(). '.' .$request->image->extension();
        $request->image->move('image/', $imageName);

        Category::create([
            'name' => $request->name,
            'image' => $imageName
        ]);

        $this->setSuccessMassage('success','Category Has Been Created');
        return redirect()->back();
    }


    public function categoryEdit($id)
    {
        $category = Category::where('id',$id)->first();
        return view('backend.pages.category.edit',compact('category'));
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category -> delete();
        $this->setSuccessMassage('success','Category Has Been Deleted');
        return redirect()->back();
    }

    public function categoryUpdate(categoryRequest $request, $id)
    {
        $category = Category::find($id);

        if($request->hasfile('image')){
            if(file_exists(public_path('images/'.$category->image))){
                unlink(public_path('images/'.$category->image));
            }else{
                $imageName = time(). '.' .$request->image->extension();
                $request->image->move('image/', $imageName);
            }
            $category->image = $imageName;
        }

        $category->update([
            'name'=>$request->name
        ]);
        $this->setSuccessMassage('success','Category Has Been Updated');
        return redirect()->back();
    }

}



