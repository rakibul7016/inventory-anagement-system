<?php

namespace App\Http\Controllers;
use App\Models\employees;
use App\Models\advance_salaryes;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder ;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addsalary()
    {
        $salary = Employees::all();
        return view('add_advance_salary',compact('salary'));
    }
    public function insertslary(Request $request)
    {
        $emp_id = $request->type;
        $month = $request->month;

        $check = DB::table('advance_salaryes')->where('month',$month)->where('emp_id',$emp_id)->first();

        if($check == NULL){

            $salary = new advance_salaryes;
            $salary->emp_id = $request->type;
            $salary->month = $request->month;
            $salary->advance_salary = $request->advance_salary;
            $salary->year = $request->year;
             $salary->save();

            if ($salary) {
                $notification=array(
                    'messege'=>'Successfully Salary Inserted',
                    'alert-type'=>'success'

                );

                return Redirect()->route('all.salary')->with($notification);
            } else {
                $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'success'
                );

         return Redirect()->back()->with($notification);
             }
        }else{
            $notification=array(
                'messege'=>'error',
                'alert-type'=>'success'
            );

             return Redirect()->back()->with($notification);
        }

     }
        // All employee show
        public function allsalary()
        {
            $salary=DB::table('advance_salaryes')->join('employees','advance_salaryes.emp_id','employees.id')->select('advance_salaryes.*','employees.name','employees.salary','employees.photo')->orderBy('id','desc')->get();
            return view('all_advance_salary', compact('salary'));
        }

}
