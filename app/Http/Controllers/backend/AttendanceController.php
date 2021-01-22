<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{

	 public function index()
    {
      $this->checkpermission('attendance-index');
        $dates = Attendance::latest('attendances.date')->where('company_id',Auth::user()->company_id)->get();
       // $dates = Attendance::where('date',$attendances.date)->join('users', 'users.id', '=', 'attendances.employee_id')->get();
        foreach ($dates as $key => $value) {
           $date[]=$value->date;
        }
        
       $dates= array_unique($date);
      // dd($dates);
       // $cust_id= Customer::latest('id')->first();
        return view('backend.attendance.index', compact('dates'));
    }

     public function create()
    {
      $this->checkpermission('attendance_create');
        $employees = User::where('company_id',Auth::user()->company_id)->get();
       // dd($employees);
        return view('backend.attendance.create', compact('employees'));
    }

     public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'attendance' => 'required',
        ];

        //$validator = Validator::make($inputs, $rules);
       // if ($validator->fails())
       // {
         //   return redirect()->back()->withErrors($validator)->withInput();
     //   }

        $date = date('Y-m-d');
        $att_date = Attendance::select('date')->where('date', $date)->where('company_id',Auth::user()->company_id)->first();

        if (!$att_date)
        {
            foreach ($request->employee_id as $emp_id) {

                $attendance = new Attendance();
                $attendance->user_id = $emp_id;
                $attendance->attendance = $request->attendance[$emp_id];
                $attendance->date = date('Y-m-d');
                $attendance->month = strtolower(date('F'));
                $attendance->year = date('Y');
                $attendance->company_id =  Auth::user()->company_id;
                $attendance->save();
            }

            return redirect()->route('backend.attendance.index')->with('success_message', 'You are successfully created');

        } else {
             return redirect()->route('Attendance.attendance.create')->with('error_message', 'can not created at this time ');
        }
    }

    public function show(Request $request, $date)
    {

        $input = \Request::all();
        $this->checkpermission('attendance-show');
        
        $attendances = Attendance::where('attendances.date', $date)->join('users', 'users.id', '=', 'attendances.user_id')
        ->where('users.company_id',Auth::user()->company_id)->get();
      // dd($attendances);
        return view('backend.attendance.show', compact('attendances','date'));
    }
     public function edit($date)
    {
      $this->checkpermission('attendance-edit');
        $attendances = Attendance::where('date', $date)->join('users', 'users.id', '=', 'attendances.user_id')->select('attendances.*','users.name')
        ->where('users.company_id',Auth::user()->company_id)->get();
       // dd($attendances);
        return view('backend.attendance.edit', compact('attendances', 'date'));
    }
    public function att_update(Request $request)
    {
    	//dd($request);
        foreach ($request->id as $att_id) {

            $up_attendance = $request->attendance[$att_id];

            $attendance = Attendance::where('users.company_id',Auth::user()->company_id)->where('id', $att_id)->first();
            $attendance->attendance = $up_attendance;
            $attendance->save();
        }

        return redirect()->route('backend.attendance.index')->with('success_message', 'You are successfully Updated');
    }
    public function destroy($date)
    {
       $check = $this->checkpermission('attendance-destroy');
        if ($check) {
            $this->checkpermission('attendance-destroy');
        } else {
            $attendances = Attendance::where('date', $date)->where('company_id',Auth::user()->company_id)->get();
        foreach ($attendances as $attendance)
        {
           $attendance= $attendance->delete();
        }
            if ($attendance) {
                return redirect()->route('backend.attendance.index')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('backend.attendance.edit')->with('error_message', 'failed to  Delete');
            }
        }



       // $attendances = Attendance::where('date', $date)->get();
      //  foreach ($attendances as $attendance)
      //  {
         //   $attendance->delete();
       // }

      //  return redirect()->route('backend.attendance.index')->with('success_message', 'You are successfully Deleted');

    }
}


