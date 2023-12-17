<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
             
            if(Auth::User()->user_type == '1')
            {
                return view('admin.product');
                
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request)
    {
       $add_product = new Product();
       $image = $request->file;
       $image_name = time() . '.' . $image->getClientOriginalExtension();
       $request->file->move('product_img',$image_name);
       
       $add_product->Image = $image_name;
       $add_product->title = $request->title;
       $add_product->Price = $request->price;
       $add_product->Description = $request->description;
       $add_product->Quantity = $request->Quantity;
       $add_product->save();
       return redirect()->back()->with('message','Product Added succesfuly');
    
    }

    public function ShowProducts()
    {
        $Products = Product::all();
        return view('admin.ShowProducts',compact('Products'));
    }

    public function ProductDelete($id){
        $Delete_Product = Product::findOrFail($id)->delete();
        return redirect()->back()->with('message','Deleted Successfuly');
    }

    public function UpdateView($id)
    {
        $ProductUpdatedView = Product::findOrFail($id);
        return view('admin.update_view',compact('ProductUpdatedView'));
    }

    public function UpdateProduct(Request $request , $id)
    {
        $UpdateProduct = Product::find($id);
        if($request->hasfile('file')){

     
        $image = $request->file;
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('product_img',$image_name);
        $UpdateProduct->Image = $image_name;
        }
        $UpdateProduct->title = $request->title;
        $UpdateProduct->Price = $request->price;
        $UpdateProduct->Description = $request->description;
        $UpdateProduct->Quantity = $request->Quantity;
        $UpdateProduct->save();
        return redirect('ShowProducts')->with('message','Product Updated succesfuly');
    }

    public function ShowOrders()
    {
        $Orders = Order::all();
        return view('admin.ShowOrders',compact('Orders'));
    }

    public function UpdateStatus($id)
    {
       $UpdateStatus = Order::find($id);
       $UpdateStatus->Status = 'Delivered';
       $UpdateStatus->save();
       return redirect()->back();
    }
}
