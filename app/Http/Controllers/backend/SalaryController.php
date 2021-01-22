<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Advanced_Salary;
use DB;

class SalaryController extends Controller
{
	public function index()
    {
        $this->checkpermission('salary-index');
        $month = date('F', strtotime('-1 month'));
        $year = date('Y', strtotime('-1 month'));
        $advanced = DB::table('advanced_salaries')->where('month', $month)->where('year', $year)->get();
        $employees = DB::table('users')->get();
       // $employees = DB::table('users')->join('advanced_salaries', 'users.id', '=', 'advanced_salaries.employee_id')
       // ->select('advanced_salaries.*','users.name','users.salary')->where('month', $month)->where('year', $year)->get();
      //  dd($employees,$advanced);
        return view('backend.salary.index', compact('employees','advanced'));
    }
    public function create()
    {
    	$employees = DB::table('employees')->get();
    	//dd('jjjj',$employees);
        return view('backend.salary.create',compact('employees'));
    }

    public function store(Request $request)
    {
       

        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'advanced_salary' => 'required',
        ]);
       

        $advanced_salary = DB::table('advanced_salaries')->where('employee_id', $request->employee_id)->where('month', $request->month)->where('year', $request->year)->first();
       // dd($advanced_salary);
        if (!$advanced_salary)
        {
            
             DB::table('advanced_salaries')->insert(
                array(
                'employee_id' => $request->input('employee_id'),
                'month' => $request->input('month'),
                'year' => $request->input('year'),
                'advanced_salary' => $request->input('advanced_salary'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                
                ));
            
            return redirect()->route('Advsalary.advsalary.create')->with('success_message', 'Advanced Salary Successfully Paid', 'Success!!!');

        } else {
           
            return redirect()->route('Advsalary.advsalary.create')->with('error_message', 'Advanced salary already paid for the employee', 'Error!!!');
        }

    }
}
