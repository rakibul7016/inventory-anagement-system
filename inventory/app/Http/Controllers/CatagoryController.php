<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

class CatagoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addcatagories()
    {
        return view('add_catagories');
    }
    public function insertcatagories(Request $request){
        $catagori = new Catagory;
        $catagori->cat_name = $request->cat_name;
             $catagori->save();

            if ($catagori) {
                $notification=array(
                    'messege'=>'Successfully Salary Inserted',
                    'alert-type'=>'success'

                );

                return Redirect()->route('all.catagories')->with($notification);
            } else {
                $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'success'
                );

         return Redirect()->back()->with($notification);
             }
    }
     // All Catagories show
     public function allcatagories()
     {
        $catagories = Catagory::all();
        return view('all_catagories',compact('catagories'));
     }
    //  Catagories Delete
     public function deleteCatagories($id)
     {
         $delete = Catagory::find($id);
         $deleteUser= Catagory::find($id)->delete();
         if ($deleteUser) {
             $notification=array(
                 'messege'=>'Successfully Employee Inserted',
                 'alert-type'=>'success'

             );

             return Redirect()->route('all.catagories')->with($notification);
         } else {
             $notification=array(
                 'messege'=>'error',
                 'alert-type'=>'success'
             );

             return Redirect()->back()->with($notification);
         }
     }
}
