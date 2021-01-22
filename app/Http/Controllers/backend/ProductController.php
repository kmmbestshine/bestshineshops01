<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\RoleModule;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkpermission('product-list');
        
        $product = Product::join('productcategories', 'products.productcategory_id', '=', 'productcategories.id')
            ->select('products.*', 'productcategories.name as n')->where('productcategories.company_id',Auth::user()->company_id)
            ->get();
        return view('backend.product.list', compact('product'));
    }
public function gstindex()
    {
        $this->checkpermission('user-view');
        $gst = DB::table('gst')->where('company_id',Auth::user()->company_id)->get();
       // dd('kkkkkkkkk',$gst);
        return view('backend.product.gstlist',compact('gst'));
    }
    public function gstcreate()
    {
       
        return view('backend.product.gstcreate');
    }
    public function gststore(Request $request)
    {
$this->checkpermission('gst-create');
       $message= DB::table('gst')->insert([
                'gst' => $request->gst,
                'status' => $request->status,
                'company_id' => Auth::user()->company_id,
                 'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                
                ]);
        
        if ($message) {
            return redirect()->route('gst.list')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('gst.create')->with('error_message', 'Failed To create');
        }
    }
    public function gstedit($id)
    {
        $this->checkpermission('gst-edit');
        $gst = DB::table('gst')->where('id',$id)->where('company_id',Auth::user()->company_id)->first();
        return view('backend.product.gstedit',compact('gst'));
    }

    public function gstupdate(Request $request, $id)
    {
       $message= DB::table('gst')->where('id',$id)->where('company_id',Auth::user()->company_id)->update([
                'gst' => $request->gst,
                'status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s'),
                
                ]);
        
        if ($message) {
            return redirect()->route('gst.list')->with('success_message', 'successfully updated');
        } else {
            return redirect()->route('gst.edit')->with('error_message', 'failed to  update');
        }
    }

     public function gstdestroy($id)
    {
       $check = $this->checkpermission('gst-delete');
        if ($check) {
            $this->checkpermission('gst-delete');
        } else {
           $message= DB::table('gst')->where('company_id',Auth::user()->company_id)->where('id',$id);
            $message = $message->delete();
            if ($message) {
                return redirect()->route('gst.list')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('gst.update')->with('error_message', 'failed to  Delete');
            }
        }

       // $message= DB::table('gst')->where('id',$id);
         //  $message = $message->delete();
          //  if ($message) {
          //      return redirect()->route('gst.list')->with('success_message', 'successfully Deleted');
          //  } else {
          //      return redirect()->route('gst.list')->with('error_message', 'failed to  Delete');
          //  }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkpermission('product-create');
        $productcategory = Productcategory::where('company_id',Auth::user()->company_id)->get();
        $gst = DB::table('gst')->where('company_id',Auth::user()->company_id)->get();
        return view('backend.product.create', compact('productcategory','gst'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $input = \Request::all();
         // dd($input);
        $this->validate($request, [
            'productcategory_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:products',
            'quantity' => 'required',
            'price' => 'required',
            'gst_percent' => 'required',
        ]);
        $message = Product::create([
            'productcategory_id' => $request->productcategory_id,
            'name' => $request->name,
            'code' => $request->code,
            'gst_percent' => $request->gst_percent,
            'quantity' => $request->quantity,
            'company_id' => Auth::user()->company_id,
            'stock' => $request->quantity,
            'price' => $request->price,
            'status' => $request->status,
            'created_by' => Auth::user()->username,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($message) {
            return redirect()->route('product.list')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('product.create')->with('error_message', 'Failed To create');
        }
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
        $this->checkpermission('product-edit');
        $product = Product::where('company_id',Auth::user()->company_id)->find($id);
        $productcategory = Productcategory::where('company_id',Auth::user()->company_id)->get();
        return view('backend.product.edit', compact('product', 'productcategory'));
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
        $this->validate($request, [
            'productcategory_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'quantity' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);
        $pc = Product::where('company_id',Auth::user()->company_id)->find($id);
        $pc->productcategory_id = $request->productcategory_id;
        $pc->name = $request->name;
        $pc->code = $request->code;
        $pc->quantity = $request->quantity;
        $pc->company_id = Auth::user()->company_id;
        $pc->stock = $request->stock;
        $pc->price = $request->price;
        $pc->status = $request->status;
        $pc->modified_by = Auth::user()->username;
        $pc->updated_at = date('Y-m-d H:i:s');
        $message = $pc->update();
        if ($message) {
            return redirect()->route('product.list')->with('success_message', 'successfully updated');
        } else {
            return redirect()->route('product.update')->with('error_message', 'failed to  update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = $this->checkpermission('product-delete');
        if ($check) {
            $this->checkpermission('product-delete');
        } else {
            $product = Product::where('company_id',Auth::user()->company_id)->find($id);
            $message = $product->delete();
            if ($message) {
                return redirect()->route('product.list')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('product.update')->with('error_message', 'failed to  Delete');
            }
        }
    }

    public function stockedit($id)
    {
        $product = Product::where('company_id',Auth::user()->company_id)->find($id);
        return view('backend.product.stockupdate', compact('product'));
    }

    public function stockupdate(Request $request, $id)
    {
        $this->validate($request, [
            'stock' => 'required',
        ]);
        $pc = Product::where('company_id',Auth::user()->company_id)->find($id);
        $pc->stock = $pc->stock + $request->stock;
        $pc->quantity = $pc->quantity + $request->stock;
        if ($pc->update()) {
            return redirect()->route('product.list')->with('success_message', 'successfully updated Your Stock');
        } else {
            return redirect()->route('stock.update')->with('error_message', 'failed to  update');
        }
    }
}
