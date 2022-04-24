<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\employees;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function takeAttendance()
    {
        $employee = Employees::all();
        return view('take_attendance', compact('employee'));
    }


    public function insertAttendance(Request $request)
    {
        $date = $request->att_date;
        $att_date = DB::table('attendances')->where('att_date',$date)->first();
        if($att_date){

                $notification=array(
                'messege'=>'error',
                'alert-type'=>'success'
            );
                return Redirect()->back()->with($notification);
        }else{
            foreach($request->user_id as $id){
                $data[]=[
                    'user_id'=>$id,
                    'attendence'=>$request->attendance[$id],
                    'att_date'=>$request->att_date,
                    'att_year'=>$request->att_year,
                    'edit_date'=>date('d_m_y')
                ];


           }
           $attend = DB::table('attendances')->insert($data);

           if ($attend) {
            $notification=array(
            'messege'=>'Successfully Employee Inserted',
            'alert-type'=>'success'

        );

            return Redirect()->route('all.employee')->with($notification);
        }
        }

    }
    public function allAttendance()
    {
       $attend = DB::table('attendances')->select('edit_date')->groupBy('edit_Date')->get();
        return view('all_attendance', compact('attend'));
    }

}
