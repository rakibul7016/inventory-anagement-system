<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addEmployee()
    {
        return view('add_employee');
    }


    public function insertEmployee(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:posts|max:255',
            'email' => 'required',
        ]);

        $employee = new Employees;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->exprience = $request->exprience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->nid_no = $request->nid_no;
        $employee->save();
        $image =$request->file('photo');
        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'employee/';
            $image_url =  $upload_path.$image_full_name;
            $success=$image->move(public_path('employee'), $image_full_name);
            if ($success) {
                $employee->photo = $image_url;
                $employee->save();
                if ($employee) {
                    $notification=array(
                    'messege'=>'Successfully Employee Inserted',
                    'alert-type'=>'success'

                );

                    return Redirect()->route('all.employee')->with($notification);
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
    public function allEmployee()
    {
        $employee = Employees::all();
        return view('all_employee', compact('employee'));
    }
    //Show single data
    public function viewEmployee($id)
    {
        $single = Employees::find($id);

        return view('single_view', compact('single'));
    }
    // Delete single data
    public function deleteEmployee($id)
    {
        $delete = Employees::find($id);
        $photo=$delete->photo;
        unlink($photo);
        $deleteUser= Employees::find($id)->delete();
        if ($deleteUser) {
            $notification=array(
                'messege'=>'Successfully Employee Inserted',
                'alert-type'=>'success'

            );

            return Redirect()->route('all.employee')->with($notification);
        } else {
            $notification=array(
                'messege'=>'error',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);
        }
    }
    public function editEmployee($id)
    {
        $edit = Employees::find($id);
        return view('edit_employee', compact('edit'));
    }



    public function updateEmployee(Request $request,$id)
    {
        $validated = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'salary' => 'required',
        'nid_no' => 'required',
    ]);

        $update=array();
        $update['name'] = $request->name;
        $update['email'] = $request->email;
        $update['phone'] = $request->phone;
        $update['address'] = $request->address;
        $update['exprience'] = $request->exprience;
        $update['salary'] = $request->salary;
        $update['vacation'] = $request->vacation;
        $update['city'] = $request->city;
        $update['nod_no'] = $request->nid_no;
        $image = $request->photo;

        if ($image) {
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'employee/';
            $image_url =  $upload_path.$image_full_name;
            $success=$image->move(public_path('employee'), $image_full_name);
            if ($success) {
                $update['photo'] = $image_url;
                $img = DB::table('employees')->where('id',$id)->fist();
                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=DB::table('employees')->where('id',$id)->update($update);
                if ($user) {
                    $notification=array(
                'messege'=>'Successfully Employee Inserted',
                'alert-type'=>'success'

            );

                    return Redirect()->route('all.employee')->with($notification);
                } else {
                    $notification=array(
                'messege'=>'error',
                'alert-type'=>'success'
            );

                    return Redirect()->back()->with($notification);
                }
            } else {
                echo'sdfdfdf';
                // return Redirect()->back();
            }
        } else {
            echo't dfdfdf';
            // return Redirect()->back();
        }
    }
}
