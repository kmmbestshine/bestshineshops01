<?php

namespace App\Http\Controllers\backend;

use App\Models\Role;
use App\Models\RoleModule;
use App\Models\UserRole;
use App\Models\Company;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, api, DB, Validator;
use Illuminate\Database\Eloquent\Model;

use Nicolaslopezj\Searchable\SearchableTrait;
use Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=\Request::all();
       // dd($input);
        $this->validate($request, [
            'company_name' => 'required',
            'company_email' => 'required',
            'company_mobile' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_image' => 'required',
            'userplan' => 'required',
            'Categorys' => 'required',
            'companystatus' => 'required',
           
        ]);

       
        
        $check = Company::where('email', $request->company_email)->where('contact_no', $request->company_mobile)->first();
        if(!$check)
        {

            $file = $request->company_image;
            $extension = $file->getClientOriginalExtension();
            $originalName= $file->getClientOriginalName();
            $filename = substr(str_shuffle(sha1(rand(3,300).time())), 0, 10) . "." . $extension;
            $file = \Image::make($file);
            $success = $file->resize(350,null, function ($constraint)
            {
                $constraint->aspectRatio();

            })->save('company/' . $filename);

            if($success)
            {
                $id = Company::insertGetId([
                    'company_name' => $request->company_name,
                    'email' => $request->company_email,
                    'contact_no' => $request->company_mobile,
                    'address' => $request->company_address,
                    'city' => $request->company_city,
                    'plan' => $request->userplan,
                    'category'=>$request->Categorys,
                    'status' => $request->companystatus,
                    'image' => 'school/'.$filename,
                    'created_at' => date('Y-m-d H:i:s'),
                    
                ]);
                $uname = '';
               // $digit = mt_rand(10, 99);
                $digit = date('Y');
                $length = strlen($id);
                if($length>1)
                {
                    $uname = $digit.$id.'Shop';
                }
                else
                {
                    $uname = $digit.'0'.$id.'Shop';
                }

                

                $user_id = User::insertGetId([
                    'type' => 'company',
                    'company_id' => $id,
                    'name' => $request->company_name,
                    'username' => $uname,
                    'email' => $request->company_email,
                    'password' => \Hash::make($request->company_mobile),
                    'hint_password' => $request->company_mobile,
                    'status' =>$request->companystatus,
                     'created_at' => date('Y-m-d H:i:s'),
                ]);
//dd($uname,$id,$request->company_mobile,$user_id);
                if($user_id){
                    Company::where('id', $id)->update(['user_id' => $user_id]);

                     $role_id = Role::insertGetId([
                   
                    'company_id' => $id,
                    'name' => 'Admin',
                     'created_at' => date('Y-m-d H:i:s'),
                   
                ]);

                }
                
                if ($role_id) {
                UserRole::create([
                'role_id' => $role_id,
                'company_id' => $id,
                'user_id' => $user_id
                 ]);
               // $role_module_id=[1,2,3,4,5,6,7,8,10,14,15,16,17,18,19,20,21,22,23,24];
               // dd($role_module_id);
                foreach ($request->modules as $key => $value) {
                   RoleModule::create([
                    'role_id' => $role_id,
                    'company_id' => $id,
                    'module_id' => $value,
                     ]);
                }
                
               // $role_permission_id=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,25,26,30,31,32,33,34,35,36,37,
              //  45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81
              //  ];
                foreach ($request->permissions as $key => $value) {
                   RolePermission::create([
                    'role_id' => $role_id,
                    'company_id' => $id,
                    'permission_id' => $value,
                     ]);
                }

                 }
                return redirect()->back()->with('success_message', 'Successfully created your Shop');
                //$message['success'] = 'Company added Successfully';
               //return Redirect::back()->withInput($message);
            }
            else
            {
                return redirect()->back()->with('error_message', 'Image Upload Failed');
               // $message['error'] = 'Image Upload Failed';
               // return Redirect::back()->withInput($message);
            }
        }
        else
        {
            return redirect()->back()->with('error_message', 'Company Already Exists');
            //$message['exist'] = 'School Already Exists';
           // return Redirect::back()->withInput($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
