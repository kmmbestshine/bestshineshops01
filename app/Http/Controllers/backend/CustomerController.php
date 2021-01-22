<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use DB;

class CustomerController extends Controller
{
    public function index()
    {
    	//dd('kkkk');
        $this->checkpermission('customer-list');
    	$customer=[];
       $customer = Customer::where('company_id',Auth::user()->company_id)->orderBy('id', 'desc')->get();
        return view('backend.customer.list', compact('customer'));
    }

     public function create()
    {
        $this->checkpermission('customer-create');
       // $salescart = Salescart::all();
        return view('backend.customer.create');
    }
     public function store(Request $request)
    {
        $input = \Request::all();
        //dd($input);
       $this->validate($request, [
            'name' => 'required',
            "cust_id" => 'required',
            //'cust_id' => 'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
        ]);
       
   // Registration No Exist Return
        $cust_id = DB::table('customers')->where('customer_id', $request->cust_id)
                ->where('company_id', \Auth::user()->company_id)
                ->first();
        if ($cust_id) {
            $input['error_message'] = 'Customer ID Already Exists';
            return \Redirect::back()->withInput($input);
        }

      // dd($input);
       $message =  DB::table('customers')->insert(
                array(
            'client_name' => $request->name,
            'customer_id' => $request->cust_id,
            'phone' => $request->mobile,
            'address' => $request->address,
            'company_id' => Auth::user()->company_id,
            'email' => $request->email,
            'dates' => date("Y-m-d"),
            'landmark' => $request->landmark,
            'gst_tin' => $request->gsttin,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
                ));
      
      // dd($request,$input);
      // $customer_id=$request->cust_id;
      // dd($customer_id);
        if ($message) {
          if($request->sale == "dashboard"){
            //$customerID=[];
            
            //dd($customerID);
           // $success_message='You are successfully created. New Customer ID:'. $request->cust_id;
            return redirect()->route('user.dashboard')->with('success_message', 'You are successfully created.  '. $request->name.'  Customer ID:   '. $request->cust_id);
          }else{
            return redirect()->route('customer.list')->with('success_message', 'You are successfully created');
          }

              
        } else {
            return redirect()->route('create.customer')->with('error_message', 'can not created at this time ');
        }
     
    }
    public function edit(Request $request, $id)
    {
      //$input=\Request::all();
      $this->checkpermission('customer-edit');
      $customer =  DB::table('customers')->where('company_id',Auth::user()->company_id)->where('id',$id)->first();
      //dd($customer->client_name,$id);
      
        return view('backend.customer.edit', compact('customer'));
    }
    public function update(Request $request, $id)
    {
     
      //$this->checkpermission('sales-create');
       // dd($input);
      $this->validate($request, [
            'name' => 'required',
           // "cust_id" => 'required|unique:customers,customer_id',
            //'cust_id' => 'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
        ]);
       $message =  DB::table('customers')->where('company_id',Auth::user()->company_id)->where('id',$id)->update(
                array(
            'client_name' => $request->name,
            'customer_id' => $request->cust_id,
            'phone' => $request->mobile,
            'address' => $request->address,
            'company_id' => Auth::user()->company_id,
            'email' => $request->email,
            'landmark' => $request->landmark,
            'gst_tin' => $request->gsttin,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s'),
                ));
      if ($message) {
           
            return redirect()->route('customer.list')->with('success_message', 'You are successfully updated');
        } else {
            return redirect()->route('customer.edit')->with('error_message', 'You con not Update rignt now');
        }
    }

    public function destroy( $id)
    {
      $check = $this->checkpermission('customer-delete');
        if ($check) {
            $this->checkpermission('customer-delete');
        } else {
            $customer =  DB::table('customers')->where('company_id',Auth::user()->company_id)->where('id',$id);
      $customer->delete();
      if ($customer) {
                return redirect()->route('customer.list')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('customer.update')->with('error_message', 'failed to  Delete');
            }
        }
      //$this->checkpermission('sales-create');
      //$customer =  DB::table('customers')->where('id',$id);
     // $customer->delete();
     // if ($customer) {
           
           // return redirect()->route('customer.list')->with('success_message', 'You are successfully deleted');
      //  } else {
         //   return redirect()->route('customer.list')->with('error_message', 'You con not delete rignt now');
       // }
    }


}
