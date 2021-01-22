<?php

namespace App\Http\Controllers\backend;

use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user.login');
    }


    public function userlist()
    {
        $this->checkpermission('user-list');
        $users = User::join('user_roles', 'user_roles.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'user_roles.role_id')
        ->select('users.*','roles.name as role_name')
        ->where('users.company_id',Auth::user()->company_id)->get();
       // $users = User::all();
        return view('backend.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkpermission('user-register');
        $role = Role::where('company_id',Auth::user()->company_id)->get();
        return view('backend.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required|unique:users|min:5|max:30',
            'password' => 'required|min:8|max:20',
            'role' => 'required',
            'salary' => 'required',
        ]);
       //  $reg_no_exist = Students::where('registration_no', $request['registration_no'])
            //    ->where('school_id', \Auth::user()->school_id)
             //   ->first();
       // if ($reg_no_exist) {
           // $input['error'] = 'Registration No Already Exists';
          //  return \Redirect::back()->withInput($input);
      //  }
        $message = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'remember_token' => $request->password,
            'password' => bcrypt($request->password),
            'company_id' => Auth::user()->company_id,
            'salary' => $request->salary,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($message) {
            UserRole::create([
                'role_id' => $request->role,
                'company_id' => Auth::user()->company_id,
                'user_id' => $message->id
            ]);
            return redirect()->route('user.register')->with('success_message', 'You are successfully register');
        } else {
            return redirect()->route('user.register')->with('error_message', 'You can not register ');
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
        $this->checkpermission('user-edit');
      $users = User::join('user_roles', 'user_roles.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'user_roles.role_id')
        ->where('users.company_id',Auth::user()->company_id)
        ->where('users.id',$id)->select('users.*','roles.name as role_name','roles.id as role_id')->first();
        return view('backend.user.edit', compact('users'));
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
        //$role = Role::all();
      //dd($role);
      
        $message = User::where('id',$id)->where('company_id',Auth::user()->company_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'remember_token' => $request->password,
            'company_id' => Auth::user()->company_id,
            'status' => $request->status,
            'salary' => $request->salary,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($message) {
           // UserRole::where('user_id',$id)->update([
              //  'role_id' => 2,
              //  'user_id' => $id
          //  ]);
            return redirect()->route('user.list')->with('success_message', 'You are successfully Updated');
        } else {
            return redirect()->route('user.edit')->with('error_message', 'You can not update ');
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

        $check = $this->checkpermission('user-delete');
        if ($check) {
            $this->checkpermission('user-delete');
        } else {
           $user = User::where('company_id',Auth::user()->company_id)->find($id);
        $user->delete();
        if ($user)  {
                return redirect()->route('user.list')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('user.update')->with('error_message', 'failed to  Delete');
            }
        }

       // $this->checkpermission('user-delete');
       // $user = User::find($id);
       // $user->delete();
       // if ($user) {
            
          //  return redirect()->route('user.list')->with('success_message', 'You are successfully Deleted');
       // } else {
          //  return redirect()->route('user.list')->with('error_message', 'You can not register ');
       // }
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            Auth::user()->last_login = date('Y-m-d H:i:s');
            Auth::user()->save();
           
        }
        $user = User::where('company_id',Auth::user()->company_id)->first();
        //$type = Auth::user()->type;
       // dd($request->username,$user);
         if($user->type == 'company'){
               // dd('Company login page');
                return redirect()->route('user.dashboard')->with('success_message', 'You are success fully loged In admin');
            }elseif($user->type == 'superadmin'){
               // dd('superadmin login page');
                return redirect()->route('superadmin.dashboard')->with('success_message', 'You are success fully super admin loged in');
            }else{
                return redirect()->route('user.dashboard')->with('error_message', 'You are success fully loged In user');
            }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('success_message', 'Successfully Loged Out');
        return redirect()->route('user.login');

    }

    /*
     * Load view of password change
     */
    public function changepassword()
    {
        $this->checkpermission('password-change');
        return view('backend.user.changepassword');
    }

    /*
     * perform password change action using secure Hash::check function
     */
    public function changesave(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
            'confirmpassword' => 'required|same:newpassword'
        ]);
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = bcrypt($request->newpassword);
            $user->update();
            return redirect()->back()->with('success_message', 'Successfully Change your Password');
        } else {
            return redirect()->back()->with('error_message', 'Your Old password is Wrong');
        }
    }

}
