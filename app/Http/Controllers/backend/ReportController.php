<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;

class ReportController extends Controller
{
    public function index()
    {
    	//dd('jjjjj');
        $this->checkpermission('sales-report');
    	
        return view('backend.report.list');
    }
    public function salesreport()
    {
    	
        $this->checkpermission('sales-report');
    	
        return view('backend.report.list');
    }
    public function salesreportpost(Request $request)
    {
       // $this->checkpermission('sales-create');
    	$input=\Request::all();
    	
    	$salesreport = Sale::join('invoicenos', 'invoicenos.invoice_id', 'sales.invoice_id')
    	->join('products', 'products.id', '=', 'sales.product_id')
    	->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
            ->select('sales.*', 'invoicenos.subtotal','invoicenos.gst_total','invoicenos.grand_total','invoicenos.discount_amt',
            	'invoicenos.paid_amt','invoicenos.due_amt','products.name as product_name','products.gst_percent','customers.client_name')
            ->whereBetween('sales.sales_date', [$request->start, $request->end])
            ->get();
          //dd($input,$salesreport);
       // $salescart = Salescart::all();
        return view('backend.report.salesreport', compact('salesreport'));
    }
}
