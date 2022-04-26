<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suppliers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class supplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSupplier()
    {
        return view('add_supplier');
    }


    public function insertSupplier(Request $request)
    {

        $validated = $request->validate([
            'supplier_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'bank_name' => 'required',
        ]);

        $supplier = new suppliers;
        $supplier->name = $request->supplier_name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;

        $supplier->shop_name = $request->shop_name;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->city = $request->city;
        $supplier->type = $request->type;
        $supplier->save();
        $image =$request->file('photo');
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'supplier/';
            $image_url =  $upload_path.$image_full_name;
            $success=$image->move(public_path('supplier'), $image_full_name);
            if ($success) {
                $supplier->photo = $image_url;
                $supplier->save();
                if ($supplier) {
                    $notification=array(
                    'messege'=>'Successfully supplier Inserted',
                    'alert-type'=>'success'

                );

                    // return Redirect()->route('all.supplier')->with($notification);
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
    // All supplier show
    public function allsupplier()
    {
        $supplier = suppliers::all();
        return view('all_suppliers', compact('supplier'));
    }
    //Show single data
    public function viewsupplier($id)
    {
        $single = suppliers::find($id);

        return view('single_view', compact('single'));
    }
    // Delete single data
    public function deletesupplier($id)
    {
        $delete = suppliers::find($id);
        $photo=$delete->photo;
        unlink($photo);
        $deleteUser= suppliers::find($id)->delete();
        if ($deleteUser) {
            $notification=array(
                'messege'=>'Successfully supplier Inserted',
                'alert-type'=>'success'

            );

            return Redirect()->route('all.supplier')->with($notification);
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
        $edit = suppliers::find($id);
        return view('edit_supplier', compact('edit'));
    }

}
