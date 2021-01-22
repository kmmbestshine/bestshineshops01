<?php

namespace App\Http\Controllers\backend;

use App\Models\Pettycash;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Productcategory;
use App\Models\Sale;
use App\Models\Salescart;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$birthday = Sale::whereMonth('sales_date', '=', date('m'))->whereDay('sales_date', '=', date('d')+1)->get();

        $sales = Sale::where('company_id',Auth::user()->company_id)->get();
        $totalrevenue = 0;
        if ($sales) {
            foreach ($sales as $w) {
                $with = $w->price;
                $totalrevenue += $with;
            }
        }
        $ccategory = Productcategory::where('company_id',Auth::user()->company_id)->get();
        $cproduct = Product::where('company_id',Auth::user()->company_id)->get();
        $totalcategory = count($ccategory);
        $totalproduct = count($cproduct);
        $salescart = Salescart::where('company_id',Auth::user()->company_id)->get();
// invoice id
          $inv_profile=\DB::table('invoiceprofiles')->first();

            $inv_prefix=$inv_profile->serialPrefix; 
            $start_serial_no=$inv_profile->serialNumberStart;
            $replacedata=$inv_prefix.$start_serial_no;

            $check_max_inv_no=\DB::table('invoicenos')->whereNotNull('invoice_id')->orderBy('invoice_id', 'desc')
            ->where('company_id',Auth::user()->company_id)->first();
            
            if($check_max_inv_no)
            {
                
                $replacedata1=$inv_prefix;
                $invid=str_replace($replacedata1,'',$check_max_inv_no->invoice_id)+1;
                $invlen=3-strlen($invid);
               // dd($invlen,$invid);
                $finalid='';
                if($invlen != 0){
                    for($i=0;$i<$invlen;$i++)
                    {
                        if($i==0)
                        {
                             $finalid='0'.$invid;   
                        }else
                        {
                            $finalid='0'.$finalid;
                        }
                    }

                }else{
                    $finalid=$invid;
                }
                $request['inv_id']=$inv_prefix.$finalid;
            }
            else
            {
                $request['inv_id']=$inv_prefix.$start_serial_no;
                $invoice=$request['inv_id'];
            }
             $inv_ids=$request['inv_id'];
             //dd($inv_ids);

        return view('backend.dashboard.index', compact('totalrevenue', 'totalcategory', 'totalproduct', 'salescart','inv_ids'));
    }
    public function superadminindex()
    {
        //$birthday = Sale::whereMonth('sales_date', '=', date('m'))->whereDay('sales_date', '=', date('d')+1)->get();
       // dd('superadmin');
        $sales = Sale::all();
        $totalrevenue = 0;
        if ($sales) {
            foreach ($sales as $w) {
                $with = $w->price;
                $totalrevenue += $with;
            }
        }
        $ccategory = Productcategory::all();
        $cproduct = Product::all();
        $totalcategory = count($ccategory);
        $totalproduct = count($cproduct);
        $salescart = Salescart::all();


        return view('backend.dashboard.superadminindex', compact('totalrevenue', 'totalcategory', 'totalproduct', 'salescart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
