<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
class HomeController extends Controller
{
    public function redirect() {
        if(Auth::id())
        {
        $user_type = Auth::User()->user_type;
        if($user_type == '1'){
            return view('admin.home');
        }
        else{
            $Products = Product::paginate(3);
            $user_cart = Auth::User();
            $Carts = Cart::where('phone', $user_cart->phone)->count();
            return view('users.home',compact('Products','Carts'));
      
    }

        }

    }

    public function index(){
        
      

         if(Auth::id()){
            
              return redirect('redirect');
        }

        else{
            
            $Products = Product::paginate(3);
            return view('users.home',compact('Products'));

        }
    }

    public function Search(Request $request) 
    {
       $Search = $request->search;


       if($Search == ''){
        $Products = Product::paginate(3);
        return view('users.home',compact('Products'));
       }else{
        $Products = Product::where('title','Like', '%' . $Search . '%')->get();
        return view('users.home',compact('Products'));
       }
    }
    
    public function AddCart(Request $request , $id)
    {
       if(Auth::id())
       {
           
        $user_data = Auth::User();
        $Products = Product::find($id);

        $Add_Cart = new Cart();
        $Add_Cart->name = $user_data->name;
        $Add_Cart->phone = $user_data->phone;
        $Add_Cart->adress = $user_data->adress;
        $Add_Cart->product_title = $Products->title;
        $Add_Cart->Quantity = $request->quantity;
        $Add_Cart->Price = $Products->Price;
        $Add_Cart->save();
         return redirect()->back()->with('message','Added Cart Succesfuly');
       }
       else{
        return redirect('login');
       }
    }

    public function ShowCarts()
    {
        $user_cart = Auth::User();
        $Carts = Cart::where('phone', $user_cart->phone)->count();
        $GetCarts = Cart::where('phone',$user_cart->phone)->get();
        return view('users.ShowCarts',compact('Carts','GetCarts'));
    }

    public function DeleteCart($id)
    {
        $Cart = Cart::findOrFail($id);
        $Cart->delete();
        return redirect()->back()->with('message','Cart Deleted Successfuly');
        
    }

    public function ConfirmOrder(Request $request)
    {
        $User = Auth::User();
        $name = $User->name;
        $phone = $User->phone;
        $adress = $User->adress;
      if($request->product_name)
      {
        foreach($request->product_name as $key=>$product_name){
            $Order = new Order();
            $Order->product_name = $request->product_name[$key];
            $Order->Quantity = $request->Quantity[$key];
            $Order->Price = $request->Price[$key];
            $Order->name = $name;
            $Order->phone = $phone;
            $Order->adress = $adress;
            $Order->Status = 'not delivered';
            $Order->save();
        }
      }
       DB::table('carts')->where('phone',$phone)->delete();
       return redirect()->back()->with('message','Product Ordered Successfuly');
    }
}
