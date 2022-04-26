<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class customerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCustomer()
    {
        return view('add_customer');
    }


    public function insertCustomer(Request $request)
    {

        $validated = $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'bank_name' => 'required',
        ]);

        $customer = new customer;
        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shop_name = $request->shop_name;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->bank_branch = $request->bank_branch;
        $customer->city = $request->city;
        $customer->save();
        $image =$request->file('photo');
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'customer/';
            $image_url =  $upload_path.$image_full_name;
            $success=$image->move(public_path('customer'), $image_full_name);
            if ($success) {
                $customer->photo = $image_url;
                $customer->save();
                if ($customer) {
                    $notification=array(
                    'messege'=>'Successfully customer Inserted',
                    'alert-type'=>'success'

                );

                    return Redirect()->back()->with($notification);
                } else {
                    echo'1dfdf';
                    $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'success'
                );
                echo'1dfdf';

                     return Redirect()->back()->with($notification);
                }
            } else {
                return Redirect()->back();
            }
        } else {
           return Redirect()->back();
        }
    }
    // All customer show
    public function allCustomer()
    {
        $customer = customer::all();
        return view('all_customer', compact('customer'));
    }
    //Show single data
    public function viewCustomer($id)
    {
        $single = customer::find($id);

        return view('single_view', compact('single'));
    }
    // Delete single data
    public function deleteCustomer($id)
    {
        $delete = customer::find($id);
        $photo=$delete->photo;
        unlink($photo);
        $deleteUser= customer::find($id)->delete();
        if ($deleteUser) {
            $notification=array(
                'messege'=>'Successfully customer Inserted',
                'alert-type'=>'success'

            );

            return Redirect()->route('all.customer')->with($notification);
        } else {
            $notification=array(
                'messege'=>'error',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);
        }
    }
    public function editcustomer($id)
    {
        $edit = customer::find($id);
        return view('edit_customer', compact('edit'));
    }



    // public function updatecustomer(Request $request,$id)
    // {
    //     $validated = $request->validate([
    //     'name' => 'required',
    //     'phone' => 'required',
    //     'address' => 'required',
    //     'salary' => 'required',
    //     'nid_no' => 'required',
    // ]);

    //     $update=array();
    //     $update['name'] = $request->name;
    //     $update['email'] = $request->email;
    //     $update['phone'] = $request->phone;
    //     $update['address'] = $request->address;
    //     $update['exprience'] = $request->exprience;
    //     $update['salary'] = $request->salary;
    //     $update['vacation'] = $request->vacation;
    //     $update['city'] = $request->city;
    //     $update['nod_no'] = $request->nid_no;
    //     $image = $request->photo;

    //     if ($image) {
    //         $image_name = Str::random(5);
    //         $ext = strtolower($image->getClientOriginalExtension());
    //         $image_full_name = $image_name.'.'.$ext;
    //         $upload_path = 'customer/';
    //         $image_url =  $upload_path.$image_full_name;
    //         $success=$image->move(public_path('customer'), $image_full_name);
    //         if ($success) {
    //             $update['photo'] = $image_url;
    //             $img = DB::table('customers')->where('id',$id)->fist();
    //             $image_path = $img->photo;
    //             $done=unlink($image_path);
    //             $user=DB::table('customers')->where('id',$id)->update($update);
    //             if ($user) {
    //                 $notification=array(
    //             'messege'=>'Successfully customer Inserted',
    //             'alert-type'=>'success'

    //         );

    //                 return Redirect()->route('all.customer')->with($notification);
    //             } else {
    //                 $notification=array(
    //             'messege'=>'error',
    //             'alert-type'=>'success'
    //         );

    //                 return Redirect()->back()->with($notification);
    //             }
    //         } else {
    //             echo'sdfdfdf';
    //             // return Redirect()->back();
    //         }
    //     } else {
    //         echo't dfdfdf';
    //         // return Redirect()->back();
    //     }
    // }
}
