<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Serviceorder;
use App\Models\Servicetype;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\User;
use Session;
use DB;

class ServiceorderController extends Controller
{
   public function index()
    {
      $Today=date('Y-m-d');
      $firstservice=[];

      $NewDate=Date('Y-m-d', strtotime('-120 days'));
     // dd($NewDate);
      $first1=DB::table('sales')->where('sales_date',$NewDate)->first();
      $first=DB::table('sales')->where('sales_date',$NewDate)->get();
      if($first1){
        $firstservice =  DB::table('customers')
            ->join('sales', 'customers.customer_id', '=', 'sales.customer_id')
            ->join('products', 'sales.product_id', '=', 'products.id')
           ->where('sales.sales_date', '=', $first1->sales_date)
           //->where('created_at->format(Y-m-d)',$NewDate)
          ->select('customers.*','products.name')->get();
      }
      
    	$serviceorders =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
      -> orderBy('serviceorders.order_id', 'DESC')
    ->where('serviceorders.status', 1)
   // ->where('technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','servicetypes.type_name','products.name')->get();
$closedserviceorders =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
    ->where('serviceorders.status', 0)
    -> orderBy('serviceorders.order_id', 'DESC')
   // ->where('technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','servicetypes.type_name','products.name')->get();

$incompserviceorders =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
    ->where('serviceorders.status', 2)
    -> orderBy('serviceorders.order_id', 'DESC')
   // ->where('technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','servicetypes.type_name','products.name')->get();

     //$input=\Request::all();
    // dd("input",Auth::user()->id == '1');
    
     return view('backend.serviceorder.list', compact('serviceorders','closedserviceorders','incompserviceorders','firstservice'));
    }

    public function getreminderlist()
    {
      $Today=date('Y-m-d');

      $TomorowDate=Date('Y-m-d', strtotime('+1 days'));
     $regular_reminder=[];
      $check=DB::table('serviceorders')->where('next_servicedate',$TomorowDate)->first();
//dd($Today,$NewDate,$first1->sales_date,$firstservice,$first1);
      if($check){
         $regular_reminder =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
      -> orderBy('serviceorders.order_id', 'DESC')
    ->where('serviceorders.next_servicedate','=', $TomorowDate)
   // ->where('technician', Auth::user()->name)
    ->select('customers.*','servicetypes.type_name','products.name')->get();
      }
     
 
   // $Today=date('Y-m-d');
$firstservice=[];
      $NewDate=Date('Y-m-d', strtotime('-119 days'));
      //dd($NewDate);
      $first1=DB::table('sales')->where('sales_date',$NewDate)->first();
      $first=DB::table('sales')->where('sales_date',$NewDate)->get();
      
     if($first1){
        $firstservice =  DB::table('customers')
            ->join('sales', 'customers.customer_id', '=', 'sales.customer_id')
            ->join('products', 'sales.product_id', '=', 'products.id')
           ->where('sales.sales_date', '=', $first1->sales_date)
           //->where('created_at->format(Y-m-d)',$NewDate)
          ->select('customers.*','products.name')->get();
      }
     // dd($firstservice);
//dd($TomorowDate,$regular_reminder,$firstservice);

        return view('backend.serviceorder.reminderlist', compact('regular_reminder','firstservice'));
    }

    public function postremindermessage()
    {
      $input=\Request::all();
       $Today=date('Y-m-d');
      $TomorowDate=Date('Y-m-d', strtotime('+1 days'));
      $sms_type=$input['type'];
      $check=DB::table('sms_status')->where('date',$Today)->where('smstype',$sms_type)->first();

      if(empty($check)){
        DB::table('sms_status')->insert([
                 'date' => $Today,
                'smstype' => $input['type'],
                 'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                
                ]);
        $message = urlencode('Dear Customer, Thank you for using our product. We are just reminding you about your RO Service date. '.$TomorowDate.' (Tomorrow) Thanks, Aqua Tech RO System.');
        $username='shtk-bss123';
        $password='12345';
        $source='DIGSMS';
        $owner_phone='9942357563';
       // $customer=\DB::table('customers')->where('customer_id',$request->customer_id)->first();
                    //  dd($message,$username,$password,$source,$customer->phone,$paid);
        foreach ($input['ph_no'] as $key => $mobile) {
          file_get_contents('http://103.16.101.52:8080/sendsms/bulksms?username='.$username.'&password='.$password.'&type=0&dlr=1&destination=91'.$mobile.'&source='.$source.'&message='.$message);
        }
        file_get_contents('http://103.16.101.52:8080/sendsms/bulksms?username='.$username.'&password='.$password.'&type=0&dlr=1&destination=91'.$owner_phone.'&source='.$source.'&message='.$message);

        return redirect()->route('service.reminder')->with('success_message', 'successfully send ');
      }else{
        return redirect()->route('service.reminder')->with('error_message', 'Already To send');
      }
      
     
    }

    public function createservicetype()
    {
        $this->checkpermission('servicetype-create');
       // $salescart = Salescart::all();
        return view('backend.serviceorder.createservicetype');
    }
    public function setlocation()
    {
     // dd('jjjj');
       // $this->checkpermission('sales-create');
       // $salescart = Salescart::all();
        return view('backend.serviceorder.WO.setlocation5');
    }
    
    public function storeservicetype(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

      // dd($request);
     $message =  DB::table('servicetypes')->insert(
                array(
                'type_name' => $request->name,
	            'slug' => $request->slug,
	            'status' => $request->status,
	            'created_by' => Auth::user()->username,
	            'created_at' => date('Y-m-d H:i:s'),
                ));
    // dd($request);
        
       
        if ($message) {
            return redirect()->route('create.servicetype')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('create.servicetype')->with('error_message', 'Failed To create');
        }
    }
     public function servicetypelist()
    {
        $this->checkpermission('servicetype-list');
        $servicetypes =  DB::table('servicetypes')->get();
       // dd($servicetypes);
        return view('backend.serviceorder.servicetypelist',compact('servicetypes'));
    }
    public function servicetypedelete($id)
    {
       $check = $this->checkpermission('servicetype-delete');
        if ($check) {
            $this->checkpermission('servicetype-delete');
        } else {
            $message =  DB::table('servicetypes')->where('id',$id);
        $message->delete();

       if ($message) {
                return redirect()->route('servicetype.list')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('servicetype.update')->with('error_message', 'failed to  Delete');
            }
        }
     
    }
     public function serviceordertechcreate()
    {
        $servicetypes =  DB::table('servicetypes')->get();
        return view('backend.serviceorder.order.techcreate',compact('servicetypes'));
    }
    public function serviceordertechcreate1(Request $request)
    {
       // $this->checkpermission('productcategory-list');
        $servicetypes =  DB::table('servicetypes')->get();
         $customer = Customer::where('customer_id',$request->customer_no)->get();
         $sales = Sale::join('products', 'products.id', 'sales.product_id')
            ->select('sales.*', 'products.name')
            ->where('sales.customer_id',$request->customer_no)
            ->get();
       // dd($servicetypes,$customer,$sales);
        return view('backend.serviceorder.order.techcreatedetails',compact('servicetypes','customer','sales'));
    }
     public function serviceordertechstore(Request $request)
    {
      $input=\Request::all();
     // dd($input);
        $this->validate($request, [
            'service_type' => 'required',
            
        ]);
        $sale = Sale::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->first();
         

         // work order number
        // Get the last order id
        $lastorder = DB::table('serviceorders')->orderBy('created_at','DESC')->first();
       // $order_id = '#'.str_pad($latestOrder->order_id + 1, 8, "0", STR_PAD_LEFT);
       // dd($latestOrder);
        if($lastorder){
          $lastorderId=$lastorder->order_id;
          
        }else{
          $lastorderId='WO-' . date('Ymd').'000';
         // dd($lastorderId);
        }
        
// Get last 3 digits of last order id
            $lastIncreament = substr($lastorderId, -3);

            // Make a new order id with appending last increment + 1
            $newOrderId = 'WO-' . date('Ymd') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);


//dd($newOrderId,$sale);
      // dd($request);
     $message =  DB::table('serviceorders')->insert(
                array(
              'customer_id' => $request->customer_id,
             'invoice_id' => $sale->invoice_id,
              'order_id' => $newOrderId,
              'servicetype_id' => $request->service_type,
              'product_id' => $request->product_id,
              'description' => $request->description,
              'contact_no' => $request->contact_no,
              'status' => '1',
             'technician' => Auth::user()->name,
              'created_at' => date('Y-m-d H:i:s'),
                ));
               //dd($servicetypes,$customer,$sales);
      if ($message) {
            return redirect()->route('workorder.task.list')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('service.order.create')->with('error_message', 'Failed To create');
        }
       
    }
    public function serviceordercreate()
    {
        $this->checkpermission('serviceorder-create');
        $servicetypes =  DB::table('servicetypes')->get();
       // dd($servicetypes);
        return view('backend.serviceorder.order.create',compact('servicetypes'));
    }
    public function serviceordercreate1(Request $request)
    {
       // $this->checkpermission('serviceorder-create');
        $servicetypes =  DB::table('servicetypes')->get();
         $customer = Customer::where('customer_id',$request->customer_no)->get();
         $sales = Sale::join('products', 'products.id', 'sales.product_id')
            ->select('sales.*', 'products.name')
            ->where('sales.customer_id',$request->customer_no)
            ->get();
       // dd($servicetypes,$customer,$sales);
        return view('backend.serviceorder.order.createdetails',compact('servicetypes','customer','sales'));
    }
    public function serviceorderstore(Request $request)
    {
      $input=\Request::all();
      
        $this->validate($request, [
            'service_type' => 'required',
            
        ]);
        $sale = Sale::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->first();
         

         // work order number
        // Get the last order id
        $lastorder = DB::table('serviceorders')->orderBy('created_at','DESC')->first();
       // $order_id = '#'.str_pad($latestOrder->order_id + 1, 8, "0", STR_PAD_LEFT);
       // dd($latestOrder);
        if($lastorder){
          $lastorderId=$lastorder->order_id;
          
        }else{
          $lastorderId='WO-' . date('Ymd').'000';
         // dd($lastorderId);
        }
        
// Get last 3 digits of last order id
            $lastIncreament = substr($lastorderId, -3);

            // Make a new order id with appending last increment + 1
            $newOrderId = 'WO-' . date('Ymd') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);


//dd($newOrderId,$sale);
      // dd($request);
     $message =  DB::table('serviceorders')->insert(
                array(
              'customer_id' => $request->customer_id,
              'invoice_id' => $sale->invoice_id,
              'order_id' => $newOrderId,
              'servicetype_id' => $request->service_type,
              'product_id' => $request->product_id,
              'description' => $request->description,
              'contact_no' => $request->contact_no,
              'status' => '1',
             // 'created_by' => Auth::user()->username,
              'created_at' => date('Y-m-d H:i:s'),
                ));
               //dd($servicetypes,$customer,$sales);
      if ($message) {
            return redirect()->route('serviceorder.list')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('service.order.create')->with('error_message', 'Failed To create');
        }
       
    }
    public function createworkorder_assign($order_id)
    {
     // $input=\Request::all();
        $this->checkpermission('order_task');
        $users = User::join('user_roles', 'user_roles.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'user_roles.role_id')
        ->select('users.*','roles.name as role_name')->get();
        //$users = User::all();
      //dd('jjjjjjjj',$users,$order_id);
        return view('backend.serviceorder.WO.assign', compact('users','order_id'));
    }
    public function storeworkorder_assign(Request $request)
    {

     // $input=\Request::all();
     // dd($input);
      $message =  DB::table('serviceorders')->where('order_id',$request->order_id)->update(
                array(
             
              'technician' => $request->staff_name,
             
                ));
               //dd($servicetypes,$customer,$sales);
      if ($message) {
            return redirect()->route('serviceorder.list')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('workorder.assign.create')->with('error_message', 'Failed To create');
        }
           }
    public function order_task_list(Request $request)
    {

$serviceorders =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
    ->where('serviceorders.status', 1)
    ->where('serviceorders.technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','servicetypes.type_name','products.name')->get();
$closedserviceorders =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
    ->where('serviceorders.status', 0)
    ->where('serviceorders.technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','servicetypes.type_name','products.name')->get();

$incompserviceorders =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
    ->where('serviceorders.status', 2)
    ->where('serviceorders.technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','servicetypes.type_name','products.name')->get();

     //$input=\Request::all();
    // dd("input",Auth::user()->id == '1');
    
     return view('backend.serviceorder.WO.tasklist', compact('serviceorders','closedserviceorders','incompserviceorders'));
           }

    public function order_task_update(Request $request,$order_id)
    {
     
$customer_id= DB::table('serviceorders')->where('order_id',$order_id)->first();
$serviceorders =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      ->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
    ->where('serviceorders.status', 1)
    ->where('serviceorders.order_id', $order_id)
    ->where('serviceorders.technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','servicetypes.type_name','products.name')->get();

    $servicehistory =  DB::table('serviceorders')
      ->join('customers', 'customers.customer_id', '=', 'serviceorders.customer_id')
      //->join('servicetypes', 'serviceorders.servicetype_id', '=', 'servicetypes.id')
      ->join('products', 'serviceorders.product_id', '=', 'products.id')
      ->where('serviceorders.status', 0)
      ->where('serviceorders.customer_id', $customer_id->customer_id)
   // ->where('serviceorders.order_id', $order_id)
   // ->where('technician', Auth::user()->name)
    ->select('serviceorders.*','customers.client_name','customers.address','products.name')->orderBy('created_at', 'ASC')->get();

     $servicematerial =  DB::table('materials')->where('customer_id',$customer_id->customer_id)->get();
     return view('backend.serviceorder.WO.taskupdate', compact('serviceorders','servicehistory','servicematerial'));
           }
    public function order_update_status(Request $request)
    {
     $input=\Request::all();
    // dd($input);
     $message1 =  DB::table('serviceorders')->where('order_id',$request->order_id)->update(
                array(
              'service_charge' => $request->service_charge,
              'service_date' => date('Y-m-d'),
              'next_servicedate' => $request->next_service_date,
              'status' => $request->status_update,
              
                ));

     //$size = count(collect($request)->get('name'));
    // $count = count((array) $request->name);
     //dd($count);
     $counts=1;
      $total=0;
     foreach ($input['addmore'] as $key => $value) {
     // $total += $value['price'];
      $material_name[]=$value['name'];
     // $qty[]=$value['qty'];
     // $price[]=$value['price'];
      $start_date[]=$value['start_date'];
      $end_date[]=$value['end_date'];
       $total_count=$counts++;
     }
//dd($total_count,$material_name);
      for ($i = 0; $i < $total_count; $i++) {
        
    $message =  DB::table('materials')->insert(
                array(
              'material_name' => $material_name[$i],
              'order_id' =>  $request->order_id,
              'customer_id' =>  $request->customer_id,
             // 'qty' => $qty[$i],
              //'price' => $price[$i],
              'start_date' => $start_date[$i],
              'end_date' =>$end_date[$i],
              'created_at' => date('Y-m-d H:i:s'),
              
                ));
    }
    $message = urlencode('Dear Customer, Thank you for the payment of  Rs. '.$request->service_charge.' of service charges for the Work Order No.' .$request->order_id.'.' );
        $username='shtk-bss123';
        $password='12345';
        $source='DIGSMS';
        $owner_phone='9942357563';
        $customer=\DB::table('customers')->where('customer_id',$request->customer_id)->first();
                    //  dd($message,$username,$password,$source,$customer->phone,$paid);
file_get_contents('http://103.16.101.52:8080/sendsms/bulksms?username='.$username.'&password='.$password.'&type=0&dlr=1&destination=91'.$customer->phone.'&source='.$source.'&message='.$message);
file_get_contents('http://103.16.101.52:8080/sendsms/bulksms?username='.$username.'&password='.$password.'&type=0&dlr=1&destination=91'.$owner_phone.'&source='.$source.'&message='.$message);
      if ($message) {
            return redirect()->route('workorder.task.list')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('workorder.update.task')->with('error_message', 'Failed To create');
        }
           }
}
