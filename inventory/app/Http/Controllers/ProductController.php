<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProduct()
    {
        return view('add_product');
    }
    public function insertproduct(Request $request)
    {

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->cat_id = $request->cat_type;
        $product->sup_id  = $request->sup_type;
        $product->product_code = $request->product_code;
        $product->product_garage = $request->Ware_house;
        $product->product_route = $request->product_route;
        $product->buy_date = $request->buy_date;
        $product->expire = $request->date;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;

        $product->save();
        $image =$request->file('photo');
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'product/';
            $image_url =  $upload_path.$image_full_name;
            $success=$image->move(public_path('product'), $image_full_name);
            if ($success) {
                $product->product_image = $image_url;
                $product->save();
                if ($product) {
                    $notification=array(
                    'messege'=>'Successfully product Inserted',
                    'alert-type'=>'success'

                );

                    return Redirect()->route('all.product')->with($notification);
                } else {
                    $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'success'
                );

                    return Redirect()->back()->with($notification);
                }
            } else {
                echo "first";
            }
        } else {
            return Redirect()->back();
        }
    }
    // All employee show
    public function allProduct()
    {
        $product = Product::all();
        return view('all_product', compact('product'));
    }

    // Delete Single product
    public function deleteProduct($id)
    {
        $delete = Product::find($id);
        $photo=$delete->product_image;
        unlink($photo);
        $deleteUser= Product::find($id)->delete();
        if ($deleteUser) {
            $notification=array(
                'messege'=>'Successfully Employee Inserted',
                'alert-type'=>'success'

            );

            return Redirect()->route('all.product')->with($notification);
        } else {
            $notification=array(
                'messege'=>'error',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);
        }
    }
    //Show single data
    public function viewProduct($id)
    {
        $single = DB::table('products')->join('catagories','products.cat_id','catagories.id')->join('suppliers','products.sup_id','suppliers.id')->select('catagories.cat_name','products.*','suppliers.name')->where('products.id',$id)->first();

        return view('product_view', compact('single'));
    }

}
