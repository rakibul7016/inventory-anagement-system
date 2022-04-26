<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request){
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $add=Cart::add($data);
        if ($add) {
            $notification=array(
            'messege'=>'Successfully customer Inserted',
            'alert-type'=>'success'

        );

            return Redirect()->back()->with($notification);
        } else {
            $notification=array(
            'messege'=>'error',
            'alert-type'=>'success'
        );
        }
    }
    public function CartUpdate(Request $request,$rowId){
        $qty=$request->qty;
        $update=Cart::update($rowId,$qty);
        if ($update) {
            $notification=array(
            'messege'=>'Successfully customer Inserted',
            'alert-type'=>'success'

        );

            return Redirect()->back()->with($notification);
        } else {

            $notification=array(
            'messege'=>'error',
            'alert-type'=>'success'
        );
        }
    }
    public function CartRemove($rowId){
        $remove=Cart::remove($rowId);
        if ($remove) {
            $notification=array(
            'messege'=>'Successfully customer Inserted',
            'alert-type'=>'success'

        );

            return Redirect()->back()->with($notification);
        } else {

            $notification=array(
            'messege'=>'error',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

        }
    }
    public function CreatInvoice(Request $request){
        $validated = $request->validate([
            'cus_id' => 'required',
        ]
    ,[
        'cus_id.required' => 'Select A customer first',
    ]);
    $cus_id=$request->cus_id;
    $customer = DB::table('customers')->where('id',$cus_id)->first();

    $contents=Cart::content();
    return view('invoice',compact('customer','contents'));
    }
    public function FinalInvoice(Request $request){
        $validated = $request->validate([
            'payment_status' => 'required',
        ]
    ,[
        'cus_id.required' => 'Select your payment',
    ]);
    $data =array();
    $data['cus_id']=$request->cus_id;
    $data['order_date']=$request->order_date;
    $data['order_status']=$request->order_status;
    $data['total_products']=$request->total_product;
    $data['sub_total']=$request->sub_total;
    $data['vat']=$request->vat;

    $data['total']=$request->total;
    $data['payment_status']=$request->payment_status;
    $data['pay']=$request->pay;
    $data['due']=$request->due;
    $order_id=DB::table('orders')->insertGetId($data);
    $contents=Cart::content();
    $odata=array();
    foreach($contents as $content){
        $odata['order_id']=$order_id;
        $odata['product_id']=$content->id;
        $odata['quantity']=$content->qty;
        $odata['unitcost']=$content->price;
        $odata['total']=$content->total;
        $insert=DB::table('order_details')->insert($odata);
    }
    if ($insert) {
        $notification=array(
        'messege'=>'Successfully customer Inserted',
        'alert-type'=>'success'

    );

        return Redirect()->back()->with($notification);
    } else {

        $notification=array(
        'messege'=>'error',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

    }
    }
}

