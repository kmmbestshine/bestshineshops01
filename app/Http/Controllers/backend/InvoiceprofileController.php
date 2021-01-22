<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoiceprofile;
use Validator;

class InvoiceprofileController extends Controller
{
    public function index()
	{
		$setting = Invoiceprofile::find(1);
		//dd($setting);
		return view('backend.companyprofile.invoicesettings', compact('setting'));
	}
	public function update(Request $request, $id)
	{
		$rules = array(
			'serialPrefix'			=> 'required|string|max:15',
			'serialNumberStart'		=> 'required|string|max:15',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			
			//toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);

			return redirect()->route('invoice.profile.create')
				->withErrors($validator)
				->withInput($request->input());

		} else {
			//Invoiceprofile::insert($request->except('_token', '_method'));
			Invoiceprofile::whereId($id)->update($request->except('_token', '_method'));

			// redirect
			//toast('Settings Updated Successfully!','success','top-right')->autoclose(3500);
			return redirect()->route('invoice.profile.create');
		}
	}
}
